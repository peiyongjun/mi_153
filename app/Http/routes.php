<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////前台相关路由///////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

Route::get('/','IndexController@index');
Route::get('/list','IndexController@goodslist');

//商品详情页
Route::get('/detail/{id}','DetailController@index');
Route::get('/specs/{id}','DetailController@specs');

//注册页面
Route::get('/register',"home\RegisterController@view");

Route::get('/captcha/{tmp}',"home\RegisterController@captche");

Route::group(['middleware'=>'register'],function(){
    Route::post('/register',"home\RegisterController@index");
});

//登录页面
Route::get('/login',"home\LoginController@index");

Route::post('/login',"home\LoginController@doLogin");

Route::get('/userlogout',"home\LoginController@logOut");

//个人中心页面
Route::group(['middleware'=>'homelogin'],function(){
    Route::get("/buy","DetailController@buyNow");

    Route::get('/user', "home\UserController@index");
    
    Route::get('/myOrder', "home\UserController@myOrder");

    Route::get('/showOrder', "home\UserController@showOrder");

    Route::get('/message', "home\UserController@message");

    Route::get('/like', "home\UserController@like");

    Route::get('/address', "home\UserController@address");

    Route::get('/server', "home\UserController@server");

    Route::get('/userSafe',"home\UserController@userSafe");

    Route::get('/Info',"home\UserController@Info");

    Route::post('/Info',"home\UserController@addInfo");

    Route::post('/doUpload',"home\UserController@doUpload");

    Route::post('/pwd',"home\UserController@pwd");

    Route::post('/email',"home\UserController@email");

    Route::post('/phone',"home\UserController@phone");

    Route::post('/updatePhone',"home\UserController@updatePhone");
});


/////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////后台相关路由///////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

//后台登录路由配置
Route::get("/admin/login","Admin\LoginController@index");//登录表单
Route::post("/admin/login","Admin\LoginController@doLogin");//登录表单

//后台页面路由群组
Route::group(["prefix"=>"admin","middleware"=>"AdminLogin"],function () {//设置路由组

    Route::get("/logout","Admin\LoginController@logout");//退出登陆

    Route::get("/user_list/toggle","Admin\UserListController@ToggleAccess");
    Route::resource("/user_list","Admin\UserListController");

    //操作货物信息的路由
    Route::get("/goods_list_all/toggle","Admin\GoodsListController@ToggleStatus");
    Route::resource("/goods_list_all","Admin\GoodsListController");
    Route::post("/goods_list_all/skus","Admin\GoodsListController@addSkus");//添加型号
    Route::get("/goods_list_off","Admin\GoodsListController@offIndex");
    //已取消的订单
	Route::get('/order_list_cancel','Admin\OrderController@Offorder');
    //全部订单信息
    Route::get('/order_list_all','Admin\OrderController@order');
    //已支付订单
    Route::get('/order_list_off', 'Admin\OrderController@Onorder');
    //确认和修改发货信息
    Route::post('/order_list_off/{id}','Admin\OrderController@doUpdate');
    Route::post('/order_list_all/Status/{id}','Admin\OrderController@Status');
    //是否取消订单信息
    Route::get('/order_list_all/cancel','Admin\OrderController@Change');
});

/////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////其 它 路 由////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
