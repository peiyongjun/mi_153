<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Users;
use App\Models\Orders;
use App\Models\Comments;
use App\Http\Requests;
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
        $comments = Comments::where("goods_id","=",$id)->where("status",1)->get();
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
    
}
