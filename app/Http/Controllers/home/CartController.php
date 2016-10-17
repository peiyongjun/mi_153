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
     * 添加购物车
     *
     * @return
     */
    public function Addcart($id)
    {
        $skus = Skus::find($id);
        $goods = Goods::find($skus->goods_id);
        $cartGoods = ["skusId"=>$id,"cartImg"=>$goods->img,"cartName"=>$goods->name,"cartGoodsId"=>$goods->id,"cartAttr"=>$skus->attr,"cartColor"=>$skus->color,"cartPrice"=>$skus->price,"cartnum"=>1];
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
        $num = 0;
        $to =0;
        foreach(session()->get('cart') as $v){
            $num += $v["cartnum"];
            $to += $v['cartPrice'] * $v['cartnum'];
        }
        session(['num'=>$num]);
        session(['total'=>$to]);
        return back();
    }

    /**
     * 判断是否重复添加
     *
     * @return
     */
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

    /**
     * 移出购物车
     *
     * @return
     */
    public function Clearcart($id)
    {
        $goods = session('cart');
        foreach($goods as $k => $v){
            if($v['skusId'] == $id){
                unset($goods[$k]);
            }
        }
        session(['cart'=>$goods]);
        $num = 0;
        $to = 0;
        foreach(session()->get('cart') as $v){
            $num += $v["cartnum"];
            $to += $v['cartPrice'] * $v['cartnum'];
        }
        session(['num'=>$num]);
        session(['total'=>$to]);
        return back();
    }

}
