<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Users;
use App\Models\Comments;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
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
        $comments = Comments::where("goods_id","=",$id)->get();
        foreach ($comments as $comment) {
            $users[$comment->id] = Comments::find($comment->id)->hasManyUsers()->first();
            $score += $comment->star;
        }
        $per = round(($score / ($comments->count()*5)),4)*100;
        return view('home.goods.comments')->with(['list'=>$list])->with(["data"=>$data])->with(["detail"=>$detail])->with(["comments"=>$comments])->with(["users"=>$users])->with(["per"=>$per]);
    }

}
