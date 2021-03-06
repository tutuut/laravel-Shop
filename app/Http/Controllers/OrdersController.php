<?php

namespace App\Http\Controllers;

use App\Events\OrderReviewed;
use App\Exceptions\InvaildRequestException;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\SendReviewRequest;
use App\Jobs\CloseOrder;
use App\Models\Order;
use App\Models\ProductSku;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Services\OrderService;
use Symfony\Component\Translation\Exception\InvalidResourceException;

class OrdersController extends Controller
{
    /**
     * 创建订单
     * @param OrderRequest $request
     * @return mixed
     */
    public function store(OrderRequest $request, OrderService $orderService)
    {
        $user = $request->user();
        $address = UserAddress::find($request->input('address_id'));

        return $orderService->store($user, $address, $request->input('remark'), $request->input('items'));
    }

    /**
     * 订单列表
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $orders = Order::query()
            //使用with方法预加载，避免N+1问题
            ->with(['items.product', 'items.productSku'])
            ->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('orders.index', compact('orders'));
    }

    /**
     * 订单详情
     * @param Order $order
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Order $order, Request $request)
    {
        $this->authorize('own', $order);
        $order = $order->load(['items.productSku', 'items.product']);
        return view('orders.show', compact('order'));
    }

    public function received(Order $order, Request $request)
    {
        //校验权限
        $this->authorize('own', $order);

        //判断订单的发货状态是否为已发货
        if ($order->ship_status !== Order::SHIP_STATUS_DLIVERED) {
            throw new InvaildRequestException('发货状态不正确');
        }

        //更新发货状态为已收到
        $order->update(['ship_status' => Order::SHIP_STATUS_RECEIVED]);

        //返回原页面
        return $order;
    }

    public function review(Order $order)
    {
        //校验权限
        $this->authorize('own', $order);
        //判断是否已经支付
        if(!$order->paid_at) {
            throw new InvaildRequestException('该订单未支付，不可评价');
        }
        //使用load方法加载关联数据，避免N+1性能问题
        return view('orders.review', ['order' => $order->load(['items.productSku', 'items.product'])]);
    }

    public function sendReview(Order $order, SendReviewRequest $request)
    {
        //校验权限
        $this->authorize('own', $order);
        if(!$order->paid_at) {
            throw new InvaildRequestException('该订单未支付，不可评价');
        }
        //判断是否已经评价
        if ($order->reviewed) {
            throw new InvaildRequestException('该订单已评价，不可重复提交');
        }
        $reviews = $request->input('reviews');
        //开启事务
        DB::transaction(function () use ($reviews, $order) {
            //遍历用户提交的数据
            foreach ($reviews as $review) {
                $orderItem = $order->items()->find($review['id']);
                //保存评分和评价
                $orderItem->update([
                    'rating'        => $review['rating'],
                    'review'        => $review['review'],
                    'reviewed_at'   => Carbon::now(),
                ]);
            }
            //将订单标记为已评价
            $order->update(['reviewed' => true]);
            event(new OrderReviewed($order));
        });

        return redirect()->back();
    }
}
