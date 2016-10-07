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
        }
        return $next($request);
    }
}
