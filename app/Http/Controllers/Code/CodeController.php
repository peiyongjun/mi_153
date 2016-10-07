<?php

namespace App\Http\Controllers\Code;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Session;
use Gregwar\Captcha\CaptchaBuilder;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function captcha (Request $request)
    {
        session_start();
        $builder = new CaptchaBuilder;
        $builder->build(120,40); //存储验证码
        $bb = $builder->inline();
        $_SESSION['piccode'] = $builder->getPhrase();
        return view('home.register',['bb'=>$bb]);
    }
}
