<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Http\Requests;
use App\Models\Skus;
use App\Models\Users;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        //所有订单信息
        $where = [];
        if ($request->id) {
            $where['id'] = $request->id;
            $orders = Orders::where('id','=',$request->id)->paginate(8);
        }else{
            $orders = Orders::paginate(8);
        }
        $skus = [];
        $goods = [];
        $users = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
            $users[$order->id] = Orders::find($order->id)->hasManyUsers()->first();
        }
        foreach($skus as $sku){
            $goods[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('admin.order_list_all')->with(['orders'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$goods])->with(['users'=>$users])->with(['where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Offorder(Request $request)
    {
        $where = [];
        if ($request->id) {
            $where['id'] = $request->id;
            $orders = Orders::where('id','=',$request->id)->where("order_status",1)->paginate(8);
        }else{
            $orders = Orders::where("order_status",1)->paginate(8);
        }
        $skus = [];
        $goods = [];
        $users = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
            $users[$order->id] = Orders::find($order->id)->hasManyUsers()->first();
        }
        foreach($skus as $sku){
            $goods[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('admin.order_list_cancel')->with(['orders'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$goods])->with(['users'=>$users])->with(['where'=>$where]);
    }
    public function Onorder(Request $request)
    {
        $where = [];
        if ($request->id) {
            $where['id'] = $request->id;
            $orders = Orders::where('id','=',$request->id)->where("order_status",2)->paginate(8);
        }else{
            $orders = Orders::where("order_status",2)->paginate(8);
        }
        $skus = [];
        $goods = [];
        $users = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
            $users[$order->id] = Orders::find($order->id)->hasManyUsers()->first();
        }
        foreach($skus as $sku){
            $goods[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('admin.order_list_off')->with(['orders'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$goods])->with(['users'=>$users])->with(['where'=>$where]);
    }
    public function doUpdate(Request $request)
    {
            //确认发货状态以及发货信息修改
        $data = $request->only('express','del_name','phone','address','order_status');
        // dd($data);
        $id = $request->id;
        $add= array();
        $address = explode('-',$request->address);
        // dd($address);
        $add["province"] = $address[0];
        $add["city"] = $address[1];
        $add["district"] = $address[2];
        
        $orders = new Orders();
        $list = $orders->where('id',$id)->update($data,$add);
        return back();
    }
    public function Change(Request $request)
    {
        //取消订单状态
        $id = $request->id;
        $orders = new Orders();
        $list = $orders->where('id',$id)->first();
        // dd($id);
        if($list->order_status == 0){
           $list->order_status = 1;

        }
        $list->save();
        return back();
    }
     public function Status(Request $request)
    {
            //确认发货状态以及发货信息修改
        $address = explode('-',$request->location);
        $data = $request->only('express','address','del_name','phone','order_status');
        
        $id = $request->id;
        $add= array();
        
        // dd($address);
        $add["province"] = $address[0];
        $add["city"] = $address[1];
        $add["district"] = $address[2];
        
        $orders = new Orders();
        $list = $orders->where('id',$id)->update($data,$add);
        return back();
    }   

}
