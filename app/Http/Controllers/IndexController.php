<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();   
        return view('home.index')->with(['list'=>$list])->with(["data"=>$data]);
    }

}
