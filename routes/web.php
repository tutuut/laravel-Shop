<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@root')->name('root')->middleware('verified');

Auth::routes(['verify' => true]);

//地址路由
Route::group(['middleware' => ['auth', 'verified']], function () {
    //用户收货地址
    Route::get('user_addresses', 'UserAddressesController@index')
        ->name('user_addresses.index');
    //新建和编辑收货地址
    Route::post('user_addresses/create', 'UserAddressesController@create')
        ->name('user_addresses.create');
});
