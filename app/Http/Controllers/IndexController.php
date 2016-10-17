<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 全部商品信息
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $stars = $goods->where("status",2)->get();

        return view('home.index')->with(['list'=>$list])->with(["data"=>$data])->with(['stars'=>$stars]);
    }

    /**
     * 全部商品列表和商品搜索
     *
     * @return 商品数据
     */
    public function goodslist (Request $request)
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        if ($request->has("s")) {
            $data = $goods->where("name","like","%{$request->s}%")->where("pid","!=","0")->get();
        }
        return view('home.list')->with(['list'=>$list])->with(["data"=>$data]);
    }


}
