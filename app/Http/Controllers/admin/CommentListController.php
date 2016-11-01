<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Goods;
use App\Models\Skus;
use App\Models\Comments;

class CommentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
    	$comments = Comments::orderBy("id",'desc')->paginate(5);
    	// dd($comments);
    	$users = [];
    	$skus = [];
        $goods = [];
    	foreach($comments as $comment){
    		$users[$comment->id] = Comments::find($comment->id)->hasManyUsers()->first();
    	}
    	foreach($comments as $comment){
    		$skus[$comment->id] = Comments::find($comment->id)->hasMSkus()->first();
    	}
    	foreach($comments as $comment){
    		$goods[$comment->id] = Comments::find($comment->id)->hasManyGoods()->first();
    	}
        return view('admin.comments_list')->with(['comments'=>$comments])->with(['users'=>$users])->with(['skus'=>$skus])->with(['goods'=>$goods]);
    }

    /**
     * 处理评论，生效
     *
     * @return 上一视图
     */
    public function valid($id)
    {
    	$comment = Comments::find($id);
    	$comment->status = 1;
    	$comment->save();
        return back();
    }

    /**
     * 处理评论，失效
     *
     * @return 上一视图
     */
    public function invalid($id)
    {
    	$comment = Comments::find($id);
    	$comment->status = 0;
    	$comment->save();
        return back();
    }

    /**
     * 处理评论，useful
     *
     * @return 上一视图
     */
    public function useful($id)
    {
    	$comment = Comments::find($id);
        $good = Comments::find($id)->hasManyGoods()->first();
        $goods_id = $good->id;
        $count = Comments::where("goods_id",$goods_id)->where("useful",1)->get()->count();
        if ($count >= 2) {
            return back();
        }
    	$comment->useful = 1;
    	$comment->save();
        return back();
    }

    /**
     * 处理评论，取消userful
     *
     * @return 上一视图
     */
    public function unuseful($id)
    {
    	$comment = Comments::find($id);
    	$comment->useful = 0;
    	$comment->save();
        return back();
    }

        /**
     * 评价晒单
     *
     * @return 待评价商品页面
     */
    public function showOrder()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $orders = Orders::where("user_id",$userId)->where('order_status','7')->orderBy("id",'desc')->get();
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }
        return view('home.user.orderComment')->with(['list'=>$list])->with(["data"=>$data])->with(['orders'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good]);
    }

    /**
     * 已评价商品
     *
     * @return 已评价页面
     */
    public function alreadyC()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $comments = Comments::where("user_id",$userId)->where("status",1)->orderBy("id",'desc')->get();
        // dd($comments);
        $orders = [];//存放评价
        foreach ($comments as $comment) {
            $orders[$comment->id] = $comment::find($comment->id)->hasManyOrders()->first();
        }
        // dd($orders);
        $skus = [];
        $good = [];
        if($orders){
            foreach($orders as $order){
                $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
            }
            foreach($skus as $sku){
                $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
            }
        }
        return view('home.user.alreadyC')->with(['list'=>$list])->with(["data"=>$data])->with(['order'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['comment'=>$comments]);
    }

    /**
     * 评价失效商品
     *
     * @return 评价失效页面
     */
    public function invalidC()
    {
        $goods = new Goods();
        $list = $goods->getType();
        $data = $goods->getAll();
        $userId = session('user')->id;
        $comments = Comments::where("user_id",$userId)->where("status",0)->orderBy("id",'desc')->get();
        // dd($comments);
        $orders = [];//存放评价
        foreach ($comments as $comment) {
            $orders[$comment->id] = $comment::find($comment->id)->hasManyOrders()->first();
        }
        // dd($orders);
        $skus = [];
        $good = [];
        foreach($orders as $order){
            $skus[$order->id] = Orders::find($order->id)->hasManySkus()->first();
        }
        foreach($skus as $sku){
            $good[$sku->id] = Skus::find($sku->id)->hasSkus()->first();
        }

        return view('home.user.invalidC')->with(['list'=>$list])->with(["data"=>$data])->with(['order'=>$orders])->with(['skus'=>$skus])->with(['goods'=>$good])->with(['comment'=>$comments]);
    }

}
