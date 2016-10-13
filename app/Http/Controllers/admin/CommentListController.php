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
    	$comments = Comments::paginate(5);
    	// dd($comments);
    	$users = [];
    	$skus = [];
    	foreach($comments as $comment){
    		$users[$comment->id] = Comments::find($comment->id)->hasManyUsers()->first();
    	}
    	foreach($comments as $comment){
    		$skus[$comment->id] = Comments::find($comment->id)->hasMSkus()->first();
    	}
    	foreach($comments as $comment){
    		$goods[$comment->id] = Comments::find($comment->id)->hasManyGoods()->first();
    	}
    	// dd($goods);
        return view('admin.comments_list')->with(['comments'=>$comments])->with(['users'=>$users])->with(['skus'=>$skus])->with(['goods'=>$goods]);
    }

    public function valid($id)
    {
    	$comment = Comments::find($id);
    	$comment->status = 1;
    	$comment->save();
    	$comments = Comments::paginate(5);
    	$users = [];
    	$skus = [];
    	foreach($comments as $comment){
    		$users[$comment->id] = Comments::find($comment->id)->hasManyUsers()->first();
    	}
    	foreach($comments as $comment){
    		$skus[$comment->id] = Comments::find($comment->id)->hasMSkus()->first();
    	}
    	foreach($comments as $comment){
    		$goods[$comment->id] = Comments::find($comment->id)->hasManyGoods()->first();
    	}
    	// dd($goods);
        return back();
    }

    public function invalid($id)
    {
    	$comment = Comments::find($id);
    	$comment->status = 0;
    	$comment->save();
    	$comments = Comments::paginate(5);
    	$users = [];
    	$skus = [];
    	foreach($comments as $comment){
    		$users[$comment->id] = Comments::find($comment->id)->hasManyUsers()->first();
    	}
    	foreach($comments as $comment){
    		$skus[$comment->id] = Comments::find($comment->id)->hasMSkus()->first();
    	}
    	foreach($comments as $comment){
    		$goods[$comment->id] = Comments::find($comment->id)->hasManyGoods()->first();
    	}
    	// dd($goods);
        return back();
    }

    public function useful($id)
    {
    	$comment = Comments::find($id);
    	$comment->useful = 1;
    	$comment->save();
    	$comments = Comments::paginate(5);
    	$users = [];
    	$skus = [];
    	foreach($comments as $comment){
    		$users[$comment->id] = Comments::find($comment->id)->hasManyUsers()->first();
    	}
    	foreach($comments as $comment){
    		$skus[$comment->id] = Comments::find($comment->id)->hasMSkus()->first();
    	}
    	foreach($comments as $comment){
    		$goods[$comment->id] = Comments::find($comment->id)->hasManyGoods()->first();
    	}
    	// dd($goods);
        return back();
    }

    public function unuseful($id)
    {
    	$comment = Comments::find($id);
    	$comment->useful = 0;
    	$comment->save();
    	$comments = Comments::paginate(5);
    	$users = [];
    	$skus = [];
    	foreach($comments as $comment){
    		$users[$comment->id] = Comments::find($comment->id)->hasManyUsers()->first();
    	}
    	foreach($comments as $comment){
    		$skus[$comment->id] = Comments::find($comment->id)->hasMSkus()->first();
    	}
    	foreach($comments as $comment){
    		$goods[$comment->id] = Comments::find($comment->id)->hasManyGoods()->first();
    	}
    	// dd($goods);
        return back();
    }

}
