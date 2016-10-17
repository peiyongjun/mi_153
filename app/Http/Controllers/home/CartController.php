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
        if(!session()->get('cart') || !in_array(["skusId"=>$id,"cartAttr"=>$skus->attr,"cartColor"=>$skus->color,"cartPrice"=>$skus->price,"cartnum"=>'1'],session()->get('cart'))){
            $cartGoods = ["skusId"=>$id,"cartAttr"=>$skus->attr,"cartColor"=>$skus->color,"cartPrice"=>$skus->price,"cartnum"=>1];
            session()->push("cart",$cartGoods);
        }else{
            foreach(session()->get('cart') as $k=>$v){
                if($v["skusId"] == $id){
                    $cartGoods['cartnum'] = $v["cartnum"] + 1;
                }
            }
            session(['cart'=>$cartGoods]);
        }
        return back()->with(['skus'=>$skus])->with(['goods'=>$goods]);
    }

}
