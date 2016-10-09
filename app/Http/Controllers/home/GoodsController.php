<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $id = $request->id;
        $info = $goods->find($id);
        return view('home.goods.buy')->with(['list'=>$list])->with(["data"=>$data])->with(["info"=>$info]);
    }
}
