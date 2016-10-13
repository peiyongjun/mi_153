<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Goods;
use App\Models\Skus;

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
        $id = session()->get('user')['id'];
        $user = Users::find($id);
        return view('home.user.userCenter')->with(['list'=>$list])->with(["data"=>$data])->with(['user'=>$user]);
    }

    public function myOrder()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $orders = Orders::where("user_id",$userId)->where('order_status','!=',1)->get();
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        // dd($orders);
        return view('home.user.validOrder')->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
    }

    public function waitPay()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.waitPay')->with(['list'=>$list])->with(["data"=>$data]);
    }

    public function down()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.down')->with(['list'=>$list])->with(["data"=>$data]);
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
        $id = session()->get('user')['id'];
        $user = Users::find($id);
        return view('home.user.userSafe')->with(["user"=>$user]);
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

    public function doUpload(Request $request)
    {
        //判断是否有上传
        if($request->hasFile("upload")){
            //获取上传信息
            $file = $request->file("upload");
            //确认上传的文件是否成功
            if($file->isValid()){
                $picname = $file->getClientOriginalName(); //获取上传原文件名
                $ext = $file->getClientOriginalExtension(); //获取上传文件名的后缀名
                $id = $request->id;
                //执行移动上传文件
                $photo = time().rand(1000,9999).".".$ext;
                $file->move("./home/Photo/",$photo);            
                //将文件名存入数据库
                $user = Users::find($id);
                $user->photo = $photo;
                $user->save();
                return redirect('/Info');
            }
        }
    }

    public function pwd(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $user = Users::find($id);
        $pwd = md5($request->prePwd);
        $password = $request->newpwd;
        $conpwd = $request->conpwd;
        if($pwd != $user->password){
            session()->flash("imsg","原密码不正确");
            // return session()->get('imsg');
            return back();
        }else{
            if(empty($pwd) || empty($password) || $password != $conpwd){
                return back();
            }else{
                $user->password = md5($password);
                $user->save();
                return back();
            }
           
        }
        // dd($request);
    }

    public function email(Request $request)
    {
        // dd($request);
        if($request->email == ''  || !preg_match("/^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/",$request->email)){
            return redirect('userSafe');
        }else{
            $id = $request->id;
            $user = Users::find($id);
            $email = $request->email;
            $user->email = $email;
            $user->save();
            return redirect('/userSafe');
        }
    }

    public function phone(Request $request)
    {
        if($request->phone == ''  || !preg_match("/^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/",$request->phone)){
            return redirect('userSafe');
        }else{
            $id = $request->id;
            $user = Users::find($id);
            $phone = $request->phone;
            $user->phone = $phone;
            $user->save();
            return redirect('/userSafe');
        }
    }

    public function updatePhone(Request $request)
    {
        $id = $request->id;
        $user = Users::find($id);
        $phone = $request->upphone;
        $user->phone = $phone;
        $user->save();
        // dd($request);
        return redirect('/userSafe');
    }
}
