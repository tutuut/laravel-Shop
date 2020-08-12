<?php


namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class StudyController
{
    public function __construct()
    {
    }

    public function userModel(User $user)
    {
        //dd($user);
        $users = User::all();
        dd($users);

    }

    public function orderTable()
    {
        //$orders = DB::table('orders')->where('id', 1)->value('ship_data');
        //$orders = DB::table('orders')->pluck('ship_data', 'id');
//        DB::table('orders')->chunkById(5, function ($orders) {
//            foreach ($orders as $order) {
//                echo $order->updated_at;
//                echo "<br>";
//            }
//        });
        //$users = DB::table('users')->count();
//        $maxPrice = DB::table('order_items')->max('price');
//        $minPrice = DB::table('order_items')->min('price');
//        $avgPrice = DB::table('order_items')->avg('price');
//        echo "Max:",$maxPrice,",Min:",$minPrice,",Avg:",$avgPrice;
        //$result = DB::table('orders')->where('id', 1)->doesntExist();
        //$users = DB::table('users')->select('name', 'email as user_email')->get();
//        $query = DB::table('users')->select('name');
//        $users = $query->addSelect('created_at')->get();
//        dump($users);
//        $orders = DB::table('orders')
//            ->selectRaw('count(*) as order_count, ship_status')
//            ->groupBy('ship_status')
//            ->get();
//        $orders = DB::table('orders')
//            ->selectRaw('total_amount * ? as price_with_tax', [10])
//            ->get();
//        $orders = DB::table('orders')
//            ->whereRaw('total_amount > ?', [5000])
//            ->get();
//        $orders = DB::table('orders')
//            ->select(DB::raw('SUM(total_amount) as total_price'), 'ship_status')
//            ->groupBy('ship_status')
//            ->havingRaw('SUM(total_amount) > ?', [2000])
//            ->get();
//        $orders = DB::table('orders')
//            ->selectRaw('(updated_at - created_at) as time')
//            ->orderByRaw('updated_at - created_at DESC')
//            ->get();
//        $orders = DB::table('order_items')
//            ->select('order_id', 'product_id')
//            ->groupByRaw('order_id, product_id')
//            ->get();
//        $orders = DB::table('orders')
//            ->join('users', 'users.id', '=', 'orders.user_id')
//            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
//            ->select('users.name', 'order_items.product_sku_id')
//            ->get();
//        $orders = DB::table('orders')
//            ->skip(1)
//            ->take(3)
//            ->get();

//        $data = [
//            [
//                'name' => 'Harden3',
//                'email' => 'email5@qq.com',
//                'password'  => bcrypt('password')
//            ],
//            [
//                'name'  => 'Rivers',
//                'email' => 'email2@qq.com',
//                'password'  => bcrypt('password')
//            ]
//        ];
//        $result = DB::table('users')->insert($data);

//        $affected = DB::table('users')
//            ->whereNull('email_verified_at')
//            ->update(['email_verified_at' => date('Y-m-d H:i:s', time())]);

        //JSON字段
//        $affected = DB::table('orders')
//            ->where('id', 1)
//            ->update(['address->address' => '杭州市西湖区1街道1号']);

        //increment,decrement
//        $affected = DB::table('orders')
//            ->where('id', 1)
//            ->increment('total_amount', -3);

//        $users = DB::table('users')
//            ->where('id', '>', 1)
//            ->lockForUpdate()
//            ->get()
//            ->dump();

        //$id = 1;
        //$users = DB::select('select * from users where id = :id', ['id' => $id]);
//        $user = [
//            'name' => 'jhj',
//            'email' => '123@123.com',
//            'password' => bcrypt('password'),
//        ];
//        $result = DB::insert('insert into users(name, email, password) values (:name, :email, :password)', $user);

        //$affected = DB::update('update users set name = :name where id = :id', ['name' => 'leijun', 'id' => 9]);

        //$affected = DB::delete('delete from users where id = :id', ['id' => 8]);
        //$result = DB::statement('delete from users where id = :id', ['id' => 7]);

        //dump($users);

    }

    public function logStu()
    {
        //$log = new Logger('name');
        //$log->pushHandler(new StreamHandler('app.log', Logger::WARNING));

        //dump(app('stu_say')::say());
        dump(app('stu_say')::say());
        $stu1 = app('stu_say');
        $stu2 = app('stu_say');
        dump($stu1);
        dump($stu2);
        echo $stu1->value;
    }


}
