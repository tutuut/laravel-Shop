<?php

namespace App\Admin\Controllers;

use App\Exceptions\InvaildRequestException;
use App\Http\Requests\Request;
use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Foundation\Validation\ValidatesRequests;

class OrdersController extends AdminController
{
    use ValidatesRequests;
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        //只展示已支付的订单，并且默认按支付时间倒序排序
        //$grid->model()->whereNotNull('paid_at')->orderBy('paid_at', 'desc');
        $grid->model()->orderBy('paid_at', 'desc');
        //$grid->column('id', __('Id'));
        $grid->column('no', __('订单流水号'));
        //展示关联关系的字段时，使用column方法
        $grid->column('user.name', '买家');
        // $grid->column('user_id', __('User id'));
        // $grid->column('address', __('Address'));
        $grid->column('total_amount', __('总金额'))->sortable();
        //$grid->column('remark', __('Remark'));
        $grid->column('paid_at', __('支付时间'))->sortable();
        //$grid->column('payment_method', __('Payment method'));
        //$grid->column('payment_no', __('Payment no'));
        $grid->column('refund_status', __('退款状态'))->display(function ($value) {
            return Order::$refundStatusMap[$value];
        });
        //$grid->column('refund_no', __('Refund no'));
        //$grid->column('closed', __('Closed'));
        //$grid->column('reviewed', __('Reviewed'));
        $grid->column('ship_status', __('物流'))->display(function ($value) {
            return Order::$shipStatusMap[$value];
        });
        //$grid->column('ship_data', __('Ship data'));
        //$grid->column('extra', __('Extra'));
        //$grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));
        //禁用创建按钮，后台不需要创建订单
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            //禁用删除和编辑按钮
            $actions->disableDelete();
            $actions->disableEdit();
        });
        $grid->tools(function ($tools) {
           //禁用批量删除按钮
            $tools->batch(function($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
//    protected function detail($id)
//    {
//        $show = new Show(Order::findOrFail($id));
//
//        $show->field('id', __('Id'));
//        $show->field('no', __('No'));
//        $show->field('user_id', __('User id'));
//        $show->field('address', __('Address'));
//        $show->field('total_amount', __('Total amount'));
//        $show->field('remark', __('Remark'));
//        $show->field('paid_at', __('Paid at'));
//        $show->field('payment_method', __('Payment method'));
//        $show->field('payment_no', __('Payment no'));
//        $show->field('refund_status', __('Refund status'));
//        $show->field('refund_no', __('Refund no'));
//        $show->field('closed', __('Closed'));
//        $show->field('reviewed', __('Reviewed'));
//        $show->field('ship_status', __('Ship status'));
//        $show->field('ship_data', __('Ship data'));
//        $show->field('extra', __('Extra'));
//        $show->field('created_at', __('Created at'));
//        $show->field('updated_at', __('Updated at'));
//
//        return $show;
//    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->text('no', __('No'));
        $form->number('user_id', __('User id'));
        $form->textarea('address', __('Address'));
        $form->decimal('total_amount', __('Total amount'));
        $form->textarea('remark', __('Remark'));
        $form->datetime('paid_at', __('Paid at'))->default(date('Y-m-d H:i:s'));
        $form->text('payment_method', __('Payment method'));
        $form->text('payment_no', __('Payment no'));
        $form->text('refund_status', __('Refund status'))->default('pending');
        $form->text('refund_no', __('Refund no'));
        $form->switch('closed', __('Closed'));
        $form->switch('reviewed', __('Reviewed'));
        $form->text('ship_status', __('Ship status'))->default('pending');
        $form->textarea('ship_data', __('Ship data'));
        $form->textarea('extra', __('Extra'));

        return $form;
    }

    /**
     * 订单详情
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('查看订单')
            //body方法可以接受Laravel的视图作为参数
        ->body(view('admin.orders.show', ['order' => Order::find($id)]));
    }

    public function ship(Order $order, Request $request)
    {
        //判断当前订单是否已支付
        if(!$order->paid_at) {
            throw new InvaildRequestException('该订单已发货');
        }
        //判断当前订单发货状态是否为未发货
        if ($order->ship_status !== Order::SHIP_STATUS_PENDING) {
            throw new InvaildRequestException('该订单已发货');
        }
        $data = $this->validate($request, [
            'express_company' => ['required'],
            'express_no'      => ['required'],
        ], [], [
            'express_commany' => '物流公司',
            'express_no'      => '物流单号',
        ]);
        //将订单发货状态改为已发货，并存入物流信息
        $order->update([
            'ship_status' => Order::SHIP_STATUS_DLIVERED,
            //在Order模型的$casts属性里指明了ship_data是一个数组
            'ship_data' => $data,
        ]);
        //返回上一页
        return redirect()->back();
    }
}
