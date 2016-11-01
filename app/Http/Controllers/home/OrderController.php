<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Orders;
use App\Models\Skus;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * 我的订单主页面，全部有效订单
     *
     * @return 有效订单页面
     */
    public function validOrder()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $orders = Orders::where("user_id",$userId)->where('order_status','!=',1)->orderBy("id",'desc')->get();
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('home.user.validOrder')->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
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
        $orders = Orders::where("user_id",$userId)->where('order_status','==',0)->orderBy("id",'desc')->get();
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
        $orders = Orders::where("user_id",$userId)->whereIn('order_status',[2,3])->orderBy("id",'desc')->get();
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
        $orders = Orders::where("user_id",$userId)->where('order_status','1')->orderBy("id",'desc')->get();
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
        return back();
    }

    /**
     * 订单页面
     *
     * @return 订单视图
     */
    public function Checkout(Request $request)
    {   //获取用户订单信息
        $id = $request->id;
        $db = Skus::find($id);
        $Gname = Goods::where('id',$db->goods_id)->first();
        return view('home.goods.checkout')->with(['id'=>$id])->with(['db'=>$db])->with(['Gname'=>$Gname]);
    }
    
    /**
     * 提交订单，支付页面
     *
     * @return 支付页面
     */
    public function Money(Request $request)
    {   
        //添加订单收货地址
        $gid = $request->id;
        $price = (Skus::where("id",$gid)->first()->price)*($request->num);
        $list = $request->dis;
        $id = $list[0];
        $upid = $list[1];
        $cid = $list[2];
        if (isset($list[3])){
            $data['address']= \DB::table('district')->where('id',$list[3])->first()->name;   
        }
        $data = array();
        $data['goods_id'] = $gid;
        $data['province'] = \DB::table('district')->where('id',$id)->first()->name;
        $data['city'] = \DB::table('district')->where('id',$upid)->first()->name;
        $data['district']= \DB::table('district')->where('id',$cid)->first()->name;
        $data['user_id'] = session()->get("user")->id;
        $data['order_status'] = 0;
        $data['goods_num'] = $request->num;
        $data['del_name'] = $request->del_name;
        $data['phone'] = $request->phone;
        $data['ctime'] = date("Y-m-d H:i:s",time());
        $ppid = Orders::insertGetId($data);
        $skus = Skus::where("id",$gid)->first();
        $skus->num = $skus->num - $request->num;
        $skus->save();
        return view('home.goods.pay')->with(['data'=>$data])->with(['price'=>$price])->with(['ppid'=>$ppid]);
    }

    /**
     * 地址级联
     *
     * @return back
     */
    public function find($upid=0)  
    {
        $address = \DB::table('district')->where('upid',$upid)->get();
        return json_encode($address); 
    }

    /**
     * 订单支付
     *
     * @return back
     */
    public function doPay(Request $request)
    {
        $id = $request->id;
        $order = Orders::find($id);
        $order->order_status = 2;
        $order->save();
        return redirect("/validOrder");
    }

    
}
