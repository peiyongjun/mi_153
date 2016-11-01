<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Session;
use Mail;
use Gregwar\Captcha\CaptchaBuilder;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function view()
    {
        return view('home.register');
    }

    public function index(Request $request)
    {
        $data = $request->only('username','email','password');
        $data['password'] = md5($data['password']);
        $id = Users::insert($data);
        return redirect('/');
    }

    public function captche(Request $request)
    {
        $builder = new CaptchaBuilder;
        $builder->build(120,40); 
        $phrase = $builder->getPhrase();
        // session()->flash('code',$phrase); //存储验证码
        session()->put('code', $phrase);
        return response($builder->output())->header('Content-Type','image/jpeg');
    }

    /**
     * Ajax检测用户名
     */
    public function checkUsername (Request $request)
    {
        $username = Users::where("username",$request->username)->first();
        if ($username) {
            return '2';
        } else {
            return '1';
        }
    }

    /**
     * 邮件验证码
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function sendMail (Request $request) {
        $GLOBALS['email'] = $request->email;
        $ecode = rand(1000,9999);
        session()->put('ecode', $ecode);
        Mail::raw("欢迎注册小米商城,您的验证码是：".$ecode,function($message){
            $message->subject("小米商城");
            $message->from('18647266785@163.com', '小米商城');
            $message->to($GLOBALS ['email']);
        });
        return $GLOBALS['email'];
    }  
}
