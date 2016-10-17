<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Skus;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    /*
     * Display a listing of the resource.
     *  商品详情页
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goods = new Goods();
        $id = $request->id;
        $list = $goods->getType();
        $data = $goods->getAll();
        $detail = $goods->find($id);
        return view('home.detail')->with(['list'=>$list])->with(["data"=>$data])->with(["detail"=>$detail]);
    }

    /*
     * 参数页面
     *  
     * @return \Illuminate\Http\Response
     */
    public function specs(Request $request)
    {
        $goods = new Goods();
        $id = $request->id;
        $list = $goods->getType();
        $data = $goods->getAll();
        $detail = $goods->find($id);
        return view('home.goods.specs')->with(['list'=>$list])->with(["data"=>$data])->with(["detail"=>$detail]);
    }

    /*
     * 购买页面
     *  
     * @return \Illuminate\Http\Response
     */
    public function buyNow(Request $request)
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $id = $request->id;
        $info = $goods->find($id);
        //获得商品型号和颜色信息
        $skus = $goods->find($id)->hasOneSkus()->get();
        $attr = [];//存放属性
        foreach ($skus as $v) {
            $attr[] = $v->attr;
        }
        $attr = array_unique($attr);//去除重复
        $color = [];//存放颜色
        foreach ($skus as $v) {
            $color[] = $v->color;
        }
        $color = array_unique($color);//去除重复
        return view('home.goods.buy')->with(['list'=>$list])->with(["data"=>$data])->with(["info"=>$info])->with(["attr"=>$attr])->with(["color"=>$color]);
    }

    //返回订单信息id
    public function getSkusId(Request $request)
    {
        $attr = trim($request->a);
        $color = trim($request->b);
        $goods_id = trim($request->c);
        $skus = Skus::where('color',$color)->where("attr",$attr)->where("goods_id",$goods_id)->where("num","!=",0)->first();
        $sku[] = $skus->id;
        $sku[] = $skus->price;
        return json_encode($sku);
    }

    public function getSkus(Request $request)
    {
        $attr = trim($request->attr);
        $gid = trim($request->gid);
        $sku = Skus::where('attr',$attr)->where("goods_id",$gid)->get();
        return $sku;
    }
}
