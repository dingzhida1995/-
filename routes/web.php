<?php

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/','Home\index@index');//微商城首页
Route::get('home/register','Home\loginController@register');//注册页面
Route::post('home/registerdo','Home\loginController@registerdo');//注册执行
Route::get('home/login','Home\loginController@login');//登录视图
Route::post('home/logindo','Home\loginController@logindo');//登录验证
Route::get('home/loginout','Home\loginController@loginout');//登录退出
Route::middleware(['checkLogin'])->group(function () {
	Route::get('home/check','checkController@check');//登录之后临时的视图
});
Route::get('home/goodsxx','Home\goods@goodsxx');//商品详情


Route::post('admin/logindo','Admin\login@logindo');//后台管理员登录处理页面
Route::get('admin/login','Admin\login@login');//后台管理员登录页面
Route::get('admin/loginout','Admin\login@loginout');//后台管理员退出
Route::middleware(['checkAdmin'])->group(function () {
    Route::get('admin','Admin\index@index');//微商城后台首页
    Route::get('admin/adduser','Admin\index@adduser');//微商城后台用户管理
    Route::post('admin/dodduser','Admin\index@dodduser');//微商城后台用户添加
    Route::get('admin/dduser','Admin\index@dduser');//微商城后台用户添加
    Route::get('admin/deluser','Admin\index@deluser');//微商城后台用户删除
    Route::get('admin/updateuser','Admin\index@updateuser');//微商城后台用户修改
    Route::post('admin/doupdateuser','Admin\index@doupdateuser');//微商城后台用户修改



    Route::get('admin/goodsAdd','Admin\goods@goodsadd');//后台商品添加页面
    Route::get('admin/goodsList','Admin\goods@goodslist');//商品展示页面
    Route::get('admin/goodsUpd','Admin\goods@goodsupd');//商品修改展示页面
    Route::post('admin/goodsDoAdd','Admin\goods@goodsdoadd');//商品添加执行页面
    Route::get('admin/goodsDel','Admin\goods@goodsdel');//商品删除页面
    Route::middleware(['checkTime'])->group(function () {
        Route::get('admin/goodsUpd','Admin\goods@goodsupd');//商品修改展示页面
        Route::post('admin/goodsDoUpd','Admin\goods@goodsdoupd');//商品修改执行页面
    });
});
Route::get('home/cart','Home\cart@addcart');//添加购物车
Route::get('home/pay','alipay@pay');//支付
Route::get('home/order','Home\cart@addorder');//添加订单
Route::get('home/doorder','Home\cart@doorder');//添加订单
Route::get('home/orderlist','Home\cart@orderlist');//添加订单
Route::post('home/zhifu','Pay\AliPayController@pay');//订单支付
Route::post('/notify_url','Pay\AliPayController@aliNotify');//异步通知
