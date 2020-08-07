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

Route::redirect('/', '/products')->name('root');
Route::get('products', 'ProductsController@index')->name('products.index');
Auth::routes(['verify' => true]);

//地址路由
Route::group(['middleware' => ['auth', 'verified']], function () {
    //用户收货地址
    Route::get('user_addresses', 'UserAddressesController@index')
        ->name('user_addresses.index');
    //新建和编辑收货地址
    Route::get('user_addresses/create', 'UserAddressesController@create')
        ->name('user_addresses.create');
    Route::post('user_addresses', 'UserAddressesController@store')
        ->name('user_addresses.store');
    Route::get('user_addresses/{user_address}', 'UserAddressesController@edit')
        ->name('user_addresses.edit');
    Route::put('user_addresses/{user_address}', 'UserAddressesController@update')
        ->name('user_addresses.update');
    Route::delete('user_addresses/{user_address}', 'UserAddressesController@destroy')
        ->name('user_addresses.destroy');
    //收藏和取消收藏
    Route::post('products/{product}/favorite', 'ProductsController@favor')
        ->name('products.favor');
    Route::delete('products/{product}/favorite', 'ProductsController@disfavor')
        ->name('products.disfavor');
    Route::get('products/favorites', 'ProductsController@favorites')->name('products.favorites');
    //添加购物车
    Route::post('cart', 'CartController@add')->name('cart.add');
});

//和products.favorites冲突
Route::get('products/{product}', 'ProductsController@show')->name('products.show');
