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
     * 我的订单主页面，全部有效订单
     *
     * @return 有效订单页面
     */
    public function myOrder()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $orders = Orders::where("user_id",$userId)->where('order_status','!=',1)->get();
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('home.user.validOrder')->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
        // dd($skus);
    }

    /**
     * 待支付订单
     *
     * @return 待支付页面
     */
    public function waitPay()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $orders = Orders::where("user_id",$userId)->where('order_status','==',0)->get();
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('home.user.waitPay')->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
    }

    /**
     * 待收货订单
     *
     * @return 待收货订单页面
     */
    public function delOrder()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $orders = Orders::where("user_id",$userId)->where('order_status','2')->orWhere('order_status','3')->get();
        // dd($orders);
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('home.user.delOrder')->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
    }

    /**
     * 确认收货
     *
     * @return 
     */
    public function delivery($id)
    {
        $orders = Orders::find($id);
        $orders->order_status = 7;
        $orders->save();
        return back();
    }
    /**
     * 已关闭订单
     *
     * @return 已关闭订单页面
     */
    public function down()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $orders = Orders::where("user_id",$userId)->where('order_status','1')->get();
        // dd($orders);
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('home.user.down')->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
    }

    /**
     * 订单详情
     *
     * @return 订单详情页面
     */
    public function orderDetail($id)
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $orderId = $id;
        $orders = Orders::where("id",$orderId)->first();
        $skus = Skus::where("id",$orders->goods_id)->first();
        $good = Goods::where("id",$skus->goods_id)->first();
        return view('home.user.orderDetail')->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
    }

    /**
     * 取消订单
     *
     * @return 订单详情页面
     */
    public function cancelOrder($id)
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $orderId = $id;
        $order = Orders::find($orderId);
        $order->order_status = 1;
        $order->save();
        $orders = Orders::where("id",$orderId)->first();
        $skus = Skus::where("id",$orders->goods_id)->first();
        $good = Goods::where("id",$skus->goods_id)->first();
        return view('home.user.orderDetail')->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
    }

    /**
     * 评价晒单
     *
     * @return 待评价商品页面
     */
    public function showOrder()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $orders = Orders::where("user_id",$userId)->where('order_status','7')->get();
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('home.user.orderComment')->with(['list'=>$list])->with(["data"=>$data])->with(['order'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
    }

    /**
     * 已评价商品
     *
     * @return 已评价页面
     */
    public function alreadyC()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $comments = Comments::where("user_id",$userId)->where("status",1)->get();
        // dd($comments);
        $orders = [];//存放评价
        foreach ($comments as $comment) {
            $orders[$comment->id] = $comment::find($comment->id)->hasManyOrders()->first();
        }
        // dd($orders);
        $skus = [];
        $good = [];
        if($orders){
            foreach($orders as $order){
                $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
            }
            foreach($skus as $sku){
                $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
            }
        }
        return view('home.user.alreadyC')->with(['list'=>$list])->with(["data"=>$data])->with(['order'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['comment'=>$comments]);
    }

    /**
     * 评价失效商品
     *
     * @return 评价失效页面
     */
    public function invalidC()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $comments = Comments::where("user_id",$userId)->where("status",0)->get();
        // dd($comments);
        $orders = [];//存放评价
        foreach ($comments as $comment) {
            $orders[$comment->id] = $comment::find($comment->id)->hasManyOrders()->first();
        }
        // dd($orders);
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }

        return view('home.user.invalidC')->with(['list'=>$list])->with(["data"=>$data])->with(['order'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['comment'=>$comments]);
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
     * 服务记录
     *
     * @return 
     */
    public function server()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $services = Service::all();
        $orders = [];
        $skus = [];
        $good = [];
        foreach($services as $service){
            $orders[$service->id] = Service::find($service->id)->hasManyOrders()->first();
        }
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        // dd($good);
        return view('home.user.server')->with(['list'=>$list])->with(["data"=>$data])->with(['order'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['services'=>$services]);
    }

    /**
     * 申请服务
     *
     * @return 
     */
    public function service()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        return view("home.user.service")->with(['list'=>$list])->with(["data"=>$data]);
    }

    /**
     * 添加申请服务
     *
     * @return 
     */
    public function addService(Request $request)
    {
        $userId = session('user')->id;
        $user = Users::where('id',$userId)->first();
        $order_id = $request->order_id;
        $orders = Orders::where('id',$order_id)->where('user_id',$userId)->whereIn('order_status', [5,7])->first();
        if(!$orders){
            return back()->with('orderMsg','订单号不正确');
        }
        $name = $user->username;
        $orders_id = $orders->id;
        $description = $request->content;
        $service = new Service;
        $services = Service::where('order_id',$orders_id)->where("status",'0')->first();
        // dd($services);
        if($services){
            return back()->with('reOrder','该订单已申请');
        }
        $service->username = $name;
        $service->order_id = $orders_id;
        $service->description = $description;
        $service->save();
        $order = Orders::find($order_id);
        $order->order_status = 4;
        $order->save();
        return back();
    }

    public function fastApply(Request $request)
    {
        $order_id = $request->order_id;
        $userId = session('user')->id;
        $user = Users::where('id',$userId)->first();
        $service = new Service;
        $services = Service::where('order_id',$request->order_id)->where("status",'0')->first();
        // dd($services);
        if($services){
            return back()->with('reOrder','该订单已申请');
            // dd(1);
        }
        $service->username = $user->username;
        $service->order_id = $request->order_id;
        $service->description = $request->content;
        $service->save();
        $order = Orders::find($order_id);
        $order->order_status = 4;
        $order->save();
        return back();
    }

    /**
     * 售后详情
     *
     * @return 
     */
    public function serverDetail($id)
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $orderId = $id;
        $service = Service::where("order_id",$orderId)->first();
        $orders = Orders::where("id",$orderId)->first();
        $skus = Skus::where("id",$orders->goods_id)->first();
        $good = Goods::where("id",$skus->goods_id)->first();   
        return view("home.user.serverDetail")->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['service'=>$service]);
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
        // dd($birthday);
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
                return redirect('/Info');
            }
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
        // dd($request);
        return redirect('/userSafe');
    }
    //结算
    public function Checkout(Request $request)
    {   //获取用户订单信息
        $id = $request->id;
        $db = Skus::find($id);
        $Gname = Goods::where('id',$db->goods_id)->first();
        // dd($id);
        return view('home.goods.checkout')->with(['id'=>$id])->with(['db'=>$db])->with(['Gname'=>$Gname]);
    }
    //支付接第三方接口
    public function Money(Request $request)
    {   
        //添加订单收货地址
        $gid = $request->id;
        $price = Skus::where("id",$gid)->first()->price;
        $list = $request->dis;
        $id = $list[0];
        $upid = $list[1];
        $cid = $list[2];
        $data = array();
        $data['goods_id'] = $gid;
        $data['province'] = \DB::table('district')->where('id',$id)->first()->name;
        $data['city'] = \DB::table('district')->where('id',$upid)->first()->name;
        $data['district']= \DB::table('district')->where('id',$cid)->first()->name;
        if (isset($list[3])){
        $data['address']= \DB::table('district')->where('id',$list[3])->first()->name;   
        }
        $data['user_id'] = session()->get("user")->id;
        $data['order_status'] = 0;
        $data['goods_num'] = 2;
        $data['del_name'] = $request->del_name;
        $data['phone'] = $request->phone;
        $data['ctime'] = date("Y-m-d H:i:s",time());
        // Orders::insert($data);
        $ppid = Orders::insertGetId($data);
      // dd($ppid);
        return view('home.goods.pay')->with(['data'=>$data])->with(['price'=>$price])->with(['ppid'=>$ppid]);
    }
    //返回订单信息id
    public function Ajax(Request $request)
    {
        $attr = trim($request->a);
        $color = trim($request->b);
        $goods_id = trim($request->c);
        $value = Skus::where('color',$color)->where("attr",$attr)->where("goods_id",$goods_id)->first();
        return $value->id;
    }
    //查询district内容
    public function find($upid=0)
    {
        $address = \DB::table('district')->where('upid',$upid)->get();
        // dd($address);
        return json_encode($address); 
    }

    public function touch(Request $request)
    {
        $id = $request->id;
        $order = Orders::find($id);
        // dd($order);
        $order->order_status = 2;
        $order->save();
        return redirect("/validOrder");
    }
}