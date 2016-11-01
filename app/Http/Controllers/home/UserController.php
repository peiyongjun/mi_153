<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Goods;
use App\Models\Skus;
use App\Models\Comments;
use App\Models\Service;

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
        $order = Orders::where("user_id",$id)->where('order_status',0)->get();
        $orders = Orders::where("user_id",$id)->where('order_status',2)->orWhere('order_status',3)->get();
        $Order = Orders::where("user_id",$id)->where('order_status',7)->get();
        return view('home.user.userCenter')->with(['list'=>$list])->with(["data"=>$data])->with(['user'=>$user])->with(['order'=>$order])->with(['orders'=>$orders])->with(['Order'=>$Order]);
    }


    /**
     * 喜欢的商品
     *
     * @return
     */
    public function like()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.like')->with(['list'=>$list])->with(["data"=>$data]);
    }

    /**
     * 收货地址
     *
     * @return
     */
    public function address()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view('home.user.address')->with(['list'=>$list])->with(["data"=>$data]);
    }

    /**
     * 个人信息
     *
     * @return 账户安全页面
     */
    public function userSafe()
    {
        $id = session()->get('user')['id'];
        $user = Users::find($id);
        return view('home.user.userSafe')->with(["user"=>$user]);
    }

    /**
     * 个人信息
     *
     * @return 个人信息页面
     */
    public function Info()
    {
        $id = session()->get('user')['id'];
        $user = Users::find($id);
        if($user->birthday){
            $birthday = explode('/',$user->birthday);
        }else{
            $birthday = "111";
        }
        return view('home.user.Info')->with(["user"=>$user])->with(['birthday'=>$birthday]);
    }

    /**
     * 个人信息
     *
     * @return 添加信息
     */
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

    /**
     * 个人信息
     *
     * @return 上传头像
     */
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
                return back();
            }
        }else{
            return back();
        }
    }

    /**
     * 个人信息
     *
     * @return 修改密码
     */
    public function pwd(Request $request)
    {
        // dd($request);
        $id = $request->id;
        $user = Users::find($id);
        $pwd = md5($request->prePwd);
        $password = $request->newpwd;
        $conpwd = $request->conpwd;
        if($pwd != $user->password){
            session("imsg","原密码不正确");
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
    }

    /**
     * 个人信息
     *
     * @return 修改邮箱
     */
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

    /**
     * 个人信息
     *
     * @return 添加手机号
     */
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

    /**
     * 个人信息
     *
     * @return 修改手机号
     */
    public function updatePhone(Request $request)
    {
        $id = $request->id;
        $user = Users::find($id);
        $phone = $request->upphone;
        $user->phone = $phone;
        $user->save();
        return redirect('/userSafe');
    }
}