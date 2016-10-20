<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Goods;
use App\Models\Skus;
use App\Models\Comments;
use App\Models\Service;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    
    /**
     * 服务记录
     *
     * @return 
     */
    public function index()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $services = Service::where('user_id',session('user')->id)->orderBy("id",'desc')->get();
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
        if($services){
            return back()->with('reOrder','该订单已申请');
        }
        $service->username = $name;
        $service->order_id = $orders_id;
        $service->description = $description;
        $service->user_id = session('user')->id;
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
        if($services){
            return back()->with('reOrder','该订单已申请');
        }
        $service->username = $user->username;
        $service->order_id = $request->order_id;
        $service->description = $request->content;
        $service->user_id = session('user')->id;
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
        $Id = $id;
        $service = Service::where("id",$Id)->first();
        $orders = Orders::where("id",$service->order_id)->first();
        $skus = Skus::where("id",$orders->goods_id)->first();
        $good = Goods::where("id",$skus->goods_id)->first();   
        return view("home.user.serverDetail")->with(['list'=>$list])->with(["data"=>$data])->with(["order"=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['service'=>$service]);
    }
}
