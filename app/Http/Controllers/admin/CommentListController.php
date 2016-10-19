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

}
