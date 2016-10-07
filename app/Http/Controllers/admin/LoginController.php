<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;//使用users表类

class LoginController extends Controller
{
    //1 登录表单
    public function index()
    {
    	return view("admin.login");
    }
    //2 执行登录 
    public function doLogin(Request $request)
    {
        //验证数据库中的用户信息 使用model类 
    	$user = new Users();
        $db = $user->checkAdmin($request);
    	//2 写入到session 
        if($db){
            session(['adminuser'=>$db]);//中间件验证的session
            session_start();//开启session
            $_SESSION['adminname'] = $db->username; //username存入到全局session中
            return redirect("/user_list");
        }else{
            return back()->with('msg',"用户名或密码错误");
        }
    }
    //执行退出 
    public function logout()
    {
    	//清空session
    	session()->forget("adminuser");
    	//实现页面跳转
    	return redirect("/admin_login");
    }
}
