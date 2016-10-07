<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Models\Users;

class LoginController extends Controller
{
    //登录表单
    public function index()
    {
        return view("home.login");
    }
    //执行登录 
    public function doLogin(Request $request)
    {
        //验证数据库中的用户信息 使用model类 
        $user = new Users();
        $db = $user->checkUser($request);
        //写入到session 
        if($db){
            session(['user'=>$db]);//中间件验证的session
            session_start();//开启session
            $_SESSION['user'] = $db->username; //username存入到全局session中
            return redirect("/");
        }else{
            return back()->with('msg',"用户名或密码错误");
        }
    }
    //执行退出 
    public function logout()
    {
        //清空session
        session()->forget("user");
        //实现页面跳转
        return redirect("/");
    }

}
