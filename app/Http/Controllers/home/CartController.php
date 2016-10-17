<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Skus;
use App\Models\Goods;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Addcart($id)
    {
        $skus = Skus::find($id);
        $goods = Goods::find($skus->goods_id);
        $cartGoods = ["skusId"=>$id,"cartImg"=>$goods->img,"cartName"=>$goods->name,"cartAttr"=>$skus->attr,"cartColor"=>$skus->color,"cartPrice"=>$skus->price,"cartnum"=>1];
        // dd($cartGoods);
        if($this->check($id)){
            $good = session('cart');
            foreach($good as $k => $v){
                if($v['skusId'] == $id){
                    $good[$k]['cartnum'] = $v['cartnum'] + 1;
                }
            }
            session(['cart'=>$good]);
        }else{
            session()->push('cart',$cartGoods);
        }
        return back()->with(['skus'=>$skus])->with(['goods'=>$goods]);
    }

    public function check($id)
    {
        $good = session('cart');
        if(empty($good)){
            return false;
        }
        foreach($good as $k => $v){
            if($v['skusId'] == $id){
                return true;
            }
        }
        return false;
    }

}
