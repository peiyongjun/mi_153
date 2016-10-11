<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
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
        $skus = $goods->find($id)->hasSkus;
        return view('home.goods.buy')->with(['list'=>$list])->with(["data"=>$data])->with(["info"=>$info])->with(["skus"=>$skus]);
    }

}
