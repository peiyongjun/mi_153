<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Comments;
use App\Http\Requests;
use App\Models\Skus;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * 商品页面的评价信息
     *
     * @return \Illuminate\Http\Response
     */
    public function showInGoods(Request $request)
    {
        $goods = new Goods();
        $id = $request->id;
        $list = $goods->getType();
        $data = $goods->getAll();
        $detail = $goods->find($id);
        $score = 0;
        $per = 0;
        $users = [];
        $comments = Comments::where("goods_id","=",$id)->where("status",1)->orderBy("id",'desc')->get();
        foreach ($comments as $comment) {
            $users[$comment->id] = Comments::find($comment->id)->hasManyUsers()->first();
            $score += $comment->star;
        }
        if($comments->count()){
            $per = $score / ($comments->count()*5)*100;
        }
        return view('home.goods.comments')->with(['list'=>$list])->with(["data"=>$data])->with(["detail"=>$detail])->with(["comments"=>$comments])->with(["users"=>$users])->with(["per"=>$per]);
    }

    /**
     * 执行添加评价
     *
     * @return \Illuminate\Http\Response
     */
    public function addComment (Request $request)
    {
        $comment = $request->only('goods_id',"order_id","content","star","skus_id");
        $comment['user_id'] = session("user")->id;
        $comment['ctime'] = date('Y-m-d H:i:s');
        Comments::insert($comment);
        $order = Orders::find($request->order_id);
        $order->order_status = '5';
        $order->save();
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
