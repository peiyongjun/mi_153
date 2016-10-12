<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Http\Requests;
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
        $data = \DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->join('goods','goods.id','=','orders.goods_id')
            ->select('orders.*','users.username','goods.name');
         $where = [];//存储搜索条件
        if($request->has('name')){
            $name = $request->input('name');
            $where['name']= $name;
        $list = $data->where('users.username','like',"%{$name}%")->paginate(4);
        }else{
        $list = $data->orderby('order_status','desc')->paginate(4);
        }
        return view('admin.order_list_all')->with(['list'=>$list])->with(['where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Offorder(Request $request)
    {
        //取消的订单
        $data = \DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->join('goods','goods.id','=','orders.goods_id')
            ->select('orders.*','users.username','goods.name');
             $where = [];
        if($request->has('name')){
            $name = $request->input('name');
            $where['name']= $name;
        $list = $data->where('users.username','like',"%{$name}%")->paginate(4);
        }else{
        $list = $data->orderby('order_status','desc')->paginate(4);
        }

        return view('admin.order_list_cancel')->with(['list'=>$list])->with(['where'=>$where]);
    }
    public function Onorder(Request $request)
    {
        //待发货的订单
        $data = \DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->join('goods','goods.id','=','orders.goods_id')
            ->select('orders.*','users.username','goods.name');
        $where = [];//存储搜索条件
        if($request->has('name')){
            $name = $request->input('name');
            $where['name']= $name;
        $list = $data->where('users.username','like',"%{$name}%")->paginate(8);
        }else{
        $list = $data->orderby('order_status','desc')->paginate(8);
        }

        return view('admin.order_list_off')->with(['list'=>$list])->with(['where'=>$where]);
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
        if($list->order_status == 2){
           $list->order_status == 3;
        }
        return back();
    }   

}
