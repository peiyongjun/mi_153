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
        
         $where = [];
        if($request->has('name')){
            $name = $request->input('name');
            $where['name']= $name;
        $list = $data->where('users.username','like',"%{$name}%")->paginate(4);
        }else{
        $list = $data->paginate(4);
        }
        return view('admin.order_list_all')->with(['list'=>$list])->with(['where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Offorder()
    {
        //取消的订单
        $list = \DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->join('goods','goods.id','=','orders.goods_id')
            ->select('orders.*','users.username','goods.name')
            ->paginate(4);
        return view('admin.order_list_cancel',['list'=>$list]);
    }
    public function Onorder()
    {
        //待发货的订单
        $list = \DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->join('goods','goods.id','=','orders.goods_id')
            ->select('orders.*','users.username','goods.name')
            ->paginate(4);

        return view('admin.order_list_off',['list'=>$list]);
    }

}
