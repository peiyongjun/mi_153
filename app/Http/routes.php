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
//主页
Route::get('/','IndexController@index');
Route::get('/list','IndexController@goodslist');

//商品详情页
Route::get('/detail/{id}','DetailController@index');
Route::get('/specs/{id}','DetailController@specs');
Route::get('/comments/{id}','home\CommentController@showInGoods');

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
    //个人中心页面
    Route::get('/user', "home\UserController@index");
    //订单页面
    //全部有效订单
    Route::get('/validOrder', "home\UserController@myOrder");
    //待支付订单
    Route::get('/waitPay',"home\UserController@waitPay");
    //待收货订单
    Route::get('/delOrder',"home\UserController@delOrder");
    //已取消订单
    Route::get('/down',"home\UserController@down");
    //订单详情页
    Route::get('/orderDetail/{id}',"home\UserController@orderDetail");
    //执行取消订单
    Route::get('/cancelOrder/{id}',"home\UserController@cancelOrder");
    //确认收货
    Route::get('/delivery/{id}',"home\UserController@delivery");
    //评价晒单
    //待评价
    Route::get('/orderComment', "home\UserController@showOrder");
    //添加评价
    Route::post('/addComment', "home\CommentController@addComment");
    //已评价
    Route::get('/alreadyC',"home\UserController@alreadyC");
    //评价无效
    Route::get('/invalidC',"home\UserController@invalidC");
    //喜欢商品页面
    Route::get('/like', "home\UserController@like");
    //收货地址页面
    Route::get('/address', "home\UserController@address");
    //售后服务页面
    //服务记录
    Route::get('/server', "home\UserController@server");
    //申请服务
    Route::get('/service', "home\UserController@service");
    //提交申请表
    Route::post('/service', "home\UserController@addService");
    //快速申请
    Route::post('/fastApply', "home\UserController@fastApply");
    //售后详情页
    Route::get('/serverDetail/{id}',"home\UserController@serverDetail");
    //账户安全页面
    Route::get('/userSafe',"home\UserController@userSafe");
    //个人信息修改
    Route::get('/Info',"home\UserController@Info");

    Route::post('/Info',"home\UserController@addInfo");
    //上传头像
    Route::post('/doUpload',"home\UserController@doUpload");
    //修改密码
    Route::post('/pwd',"home\UserController@pwd");
    //修改邮箱
    Route::post('/email',"home\UserController@email");
    //添加手机号
    Route::post('/phone',"home\UserController@phone");
    //修改手机号
    Route::post('/updatePhone',"home\UserController@updatePhone");
    //选择完成后跳转至生成订单界面
    Route::get('/buy/checkout/{id}',"home\UserController@Checkout");
    Route::post('/buy/Pay/{id}',"home\UserController@Money");
    Route::get('/buy/Ajax',"home\UserController@Ajax");
    Route::get('/buy/district/{upid?}',"home\UserController@find");
    Route::get('/buy/cart/{id}',"home\CartController@Addcart");
    // Route::get('/buy/order',"home\UserController@Del");
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
    //评价管理
    Route::get("/comments_list","Admin\CommentListController@index");
    Route::get("/comments_list/valid/{id?}","Admin\CommentListController@valid");
    Route::get("/comments_list/invalid/{id?}","Admin\CommentListController@invalid");
    Route::get("/comments_list/useful/{id?}","Admin\CommentListController@useful");
    Route::get("/comments_list/unuseful/{id?}","Admin\CommentListController@unuseful");
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
    //未处理售后
    Route::get('/untreatedServer','Admin\ServiceController@untreatedServer');
    //已处理售后
    Route::get('/treatedServer','Admin\ServiceController@treatedServer');

    Route::get('/alreadyS/{id}','Admin\ServiceController@alreadyS');
});

/////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////其 它 路 由////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
