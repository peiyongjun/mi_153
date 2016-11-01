<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Users;

class RegisterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $db = Users::where("username",$request->username)->first();
        if(empty($request->username)){
            return redirect('/register');
        }else if($db){
            return redirect('/register');
        }else if(empty($request->email)){
            return redirect('/register');
        }else if(empty($request->password) || ($request->password != $request->repass)){
            return redirect('/register');
        }else if(empty($request->icode)){
            return redirect('/register');
        }else if($request->icode != session()->get('code')){
            return redirect('/register')->with("msg",'验证码错误');
        }else if($request->ecode != session()->get('ecode')){
            return redirect('/register')->with("emsg",'邮件验证码错误');
        }
        return $next($request);
    }
}
