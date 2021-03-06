<?php

namespace App\Providers;

use App\Http\Controllers\StuController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;
use Yansongda\Pay\Log;
use Yansongda\Pay\Pay;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('alipay', function () {
            $config = config('pay.alipay');
            //$config['notify_url'] = route('payment.alipay.notify');
            $config['notify_url'] = 'http://requestbin.net/r/1kll40z1';
            $config['return_url'] = route('payment.alipay.return');
            //判断当前项目运行环境是否为线上环境
            if (app()->environment() !== 'production') {
                $config['mode'] = 'dev';
                $config['log']['level'] = Logger::DEBUG;
            } else {
                $config['log']['level'] = Logger::WARNING;
            }
            //调用 Yansongda\Pay来创建一个支付宝支付对象
            return Pay::alipay($config);
        });

        $this->app->singleton('wechat_pay', function () {
            $config = config('pay.wechat');
            if (app()->environment() !== 'production') {
                $config['log']['level'] = Logger::DEBUG;
            } else {
                $config['log']['level'] = Logger::WARNING;
            }

            return Pay::wechat($config);
        });

//        $this->app->bind('stu_say', function ($app) {
//            return new \App\Http\Controllers\StuController;
//        });
//        $this->app->singleton('stu_say', function ($app) {
//            return new \App\Http\Controllers\StuController;
//        });
        $api = new StuController();
        $this->app->instance('stu_say', $api);

        $this->app->when('StuController')
            ->needs('$value')
            ->give(3);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        DB::listen(function ($query) {
            dump($query->sql);//"select * from users where id = :id"
            dump($query->bindings);//["id" => 1]
            dump($query->time);//1.44ms
        });
    }
}
