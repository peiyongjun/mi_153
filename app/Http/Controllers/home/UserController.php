<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.userCenter')->with(['list'=>$list])->with(["data"=>$data]);
    }

    public function myOrder()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.myOrder')->with(['list'=>$list])->with(["data"=>$data]);
    }

    public function message()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.message')->with(['list'=>$list])->with(["data"=>$data]);
    }

    public function showOrder()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.showOrder')->with(['list'=>$list])->with(["data"=>$data]);
    }

    public function like()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.like')->with(['list'=>$list])->with(["data"=>$data]);
    }

    public function address()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.address')->with(['list'=>$list])->with(["data"=>$data]);
    }

    public function server()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.server')->with(['list'=>$list])->with(["data"=>$data]);
    }

    public function userSafe()
    {
        return view('home.user.userSafe');
    }

    public function Info()
    {
        $id = session()->get('user')['id'];
        $user = Users::find($id);
        if($user->birthday){
            $birthday = explode('/',$user->birthday);
        }else{
            $birthday = "111";
        }
        // dd($birthday);
        return view('home.user.Info')->with(["user"=>$user])->with(['birthday'=>$birthday]);
    }

    public function addInfo(Request $request)
    {
        $id = $request->id;
        $user = Users::find($id);
        $user->name = $request->nickname;
        if(!empty($request->YYYY) && !empty($request->MM) && !empty($request->DD)){
            $user->birthday = $request->YYYY.'/'.$request->MM.'/'.$request->DD;
        }
        $user->sex = $request->sex;
        $user->save();
        return redirect('/Info');
    }

}
