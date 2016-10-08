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


Route::get('/demo1', function () {
    return view('home.detail');
});

Route::post('/login',"home\LoginController@doLogin");

Route::get('/login',"home\LoginController@index");

Route::group(['middleware'=>'homelogin'],function(){
    Route::get('/user', "home\UserController@index");
    
    Route::get('/myOrder', "home\UserController@myOrder");

    Route::get('/showOrder', "home\UserController@showOrder");

    Route::get('/message', "home\UserController@message");

    Route::get('/like', "home\UserController@like");

    Route::get('/address', "home\UserController@address");

    Route::get('/server', "home\UserController@server");
});

//注册页面
Route::get('/register',"code\CodeController@captcha");

Route::group(['middleware'=>'register'],function(){
    Route::post('/register',"home\RegisterController@index");
});


/////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////后台相关路由///////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

//后台登录路由配置
Route::get("/admin_login","Admin\LoginController@index");//登录表单
Route::post("/admin_login","Admin\LoginController@doLogin");//登录表单

//后台页面路由群组
Route::group(["middleware"=>"AdminLogin"],function () {//设置路由组

    Route::get("/logout","Admin\LoginController@logout");//退出登陆

    Route::get("/user_list/toggle","Admin\UserListController@ToggleAccess");
    Route::resource("/user_list","Admin\UserListController");

    //操作货物信息的路由
    Route::get("/goods_list_all/toggle","Admin\GoodsListController@ToggleStatus");
    Route::resource("/goods_list_all","Admin\GoodsListController");
    Route::get("/goods_list_off","Admin\GoodsListController@offIndex");
	// Route::get('/goods_list_off', function () {
	//     return view('admin.goods_list_off');
	// });

	Route::get('/order_list_cancel', function () {
        return view('admin.order_list_cancel');
    });
    
    Route::get('/order_list_all', function () {
        return view('admin.order_list_all');
    });

    Route::get('/order_list_off', function () {
        return view('admin.order_list_off');
    });
});

/////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////其 它 路 由////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
