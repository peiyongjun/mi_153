<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Session;
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
        session()->flash('code',$phrase); //存储验证码
        return response($builder->output())->header('Content-Type','image/jpeg');
    }

}
