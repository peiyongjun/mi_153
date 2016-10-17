<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Goods;
use App\Models\Skus;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * 未处理售后
     *
     * @return 
     */
    public function untreatedServer()
    {
        $services = Service::where("status",0)->paginate(5);
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
        return view("admin.untreatedServer")->with(['order'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['services'=>$services]);
    }

    /**
     * 未处理售后改为已处理售后
     *
     * @return 
     */
    public function alreadyS($id)
    {
        $service = Service::find($id);
        $service->status = 1;
        $service->save();
        $order = Orders::find($service->order_id);
        $order->order_status = 5;
        $order->save();
        // dd($order);
        return back();
    }

    public function treatedServer()
    {
        $services = Service::where("status",1)->paginate(5);
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
        return view("admin.treatedServer")->with(['order'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['services'=>$services]);
    }

}
