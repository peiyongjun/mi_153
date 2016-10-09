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
}
