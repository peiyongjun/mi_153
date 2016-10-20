<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Goods; //Goods表模型
use App\Models\Skus; //Goods表模型
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events\Image; //图片处理插件

class GoodsListController extends Controller
{
    /**
     * 获取所有货物信息
     *
     * @return 返回到所有商品视图
     */
    public function index (Request $request)
    {
        $search = [];            //存放搜索条件的空数组
        if($request->has('name')){  //搜索条件查询
            //进行了搜索
            $name = $request->input('name');
            $data = Goods::where("pid","!=",0)->where("name","like","%{$name}%")->orderBy("id",'desc')->paginate(5);
            $search['name'] = $name; // 条件放进数组
        }else{
            //没有进行搜索
            $data = Goods::where("pid","!=",0)->orderBy("id",'desc')->paginate(5);
        }
        $types = Goods::where("pid","=",0)->get();
        $type = [];
        foreach ($types as $k => $v) {
            $type[$v->id] = $v->name;
        }
        return view('admin.goods_list_all')->with(['data'=>$data])->with(["type"=>$type])->with(["search"=>$search]);
    }

    /**
     * 上下架操作
     * @param  int $id 
     * @return None    跳回上一个页面
     */
    public function ToggleStatus (Request $request)
    {
        $id = $request->id;
        // 执行下架操作
        $good = Goods::find($id);
        if ($good->status != 0) {
            $good->status = '0';
        } else if($good->status == 0) {
            $good->status = '1';
        }
        $good->save();
        return back();
    }

    /**
     * 明星单品操作
     * @param  int $id 接收到的id
     * @return None    跳回上一个页面
     */
    public function ToggleStar (Request $request)
    {
        $id = $request->id;
        // 执行下架操作
        $good = Goods::find($id);
        if ($good->status == 2) {
            $good->status = '1';
        } else {
            $good->status = '2';
        }
        $good->save();
        return back();
    }

    /**
     * 新增商品信息
     * @param  Request $request 表单数据
     * @return None          直接跳回上一个页面
     */
    public function store (Request $request)
    {
        //判断是否选择分类
        if ($request->pid == "type") { //没有选择，添加大类
            $data = $request->only("name");//获取信息
            $data['pid'] = 0;
            $data['status'] = 1;
            $id = Goods::insert($data);//写入数据库
            return back()->with(["msg"=>"添加类别成功"]);
        }else{ //选择分类，添加商品
            $data = $request->only("name","price","pid","goodsTitle");//获取信息
            $imgfile = $request->file('img');
            $detailfile = $request->file('detail');
            $specsfile = $request->file('specs');
            if (!($imgfile && $detailfile && $specsfile)) {
                return back();
            }
            if($imgfile->isValid()){
                //执行上传img
                $ext = $imgfile->getClientOriginalExtension();//获得后缀 
                $imgname = time().rand(1000,9999).".".$ext;//新文件名
                $imgfile->move("./Uploads/Picture/",$imgname);
                // 执行缩放
                $img = new Image();
                $img->open("./Uploads/Picture/".$imgname)->thumb(160,110)->save("./Uploads/Picture/".$imgname);
                //执行上传detail
                $ext = $detailfile->getClientOriginalExtension();//获得后缀 
                $detailname = time().rand(1000,9999).".".$ext;//新文件名
                $detailfile->move("./Uploads/detail/",$detailname);
                //执行上传specs
                $ext = $specsfile->getClientOriginalExtension();//获得后缀 
                $specsname = time().rand(1000,9999).".".$ext;//新文件名
                $specsfile->move("./Uploads/specs/",$specsname);
                //储存文件名
                $data['img'] = $imgname;
                $data['detail'] = $detailname;
                $data['specs'] = $specsname;
                $data['status'] = 0;
                $id = Goods::insert($data);//写入数据库
                return back();
            }
        }
        return back();
    }

    /**
     * 修改商品信息
     * @param  Request $request 请求数据
     * @param  int  $id         接收到的id
     * @return None             上一页面
     */
    public function update (Request $request,$id)
    {
        $db = Goods::find($id);
        //更新模型数据
        $db->name = $request->name;
        $db->price = $request->price;
        $db->num = $request->num;
        if (!($db->pid)) {
           $db->pid = $request->pid;
        }
        $db->goodsTitle = $request->goodsTitle;
        if ($request->file('img')) {
            $file = $request->file('img');
            if($file->isValid()){
                $ext = $file->getClientOriginalExtension();//获得后缀 
                $filename = time().rand(1000,9999).".".$ext;//新文件名
                $file->move("./Uploads/Picture/",$filename);
            }
            // 执行缩放
            $img = new Image();
            $img->open("./Uploads/Picture/".$filename)->thumb(160,110)->save("./Uploads/Picture/".$filename);
            $db->img = $filename;
        }
        $db->save();
        return back();
    }

    /**
     * 获取下架的货物信息
     *
     * @return 返回到所有商品视图
     */
    public function offIndex (Request $request)
    {
        $search = [];            //存放搜索条件的空数组
        if($request->has('name')){  //搜索条件查询
            //进行了搜索
            $name = $request->input('name');
            $data = Goods::where("pid","!=",0)->where("status","=",0)->where("name","like","%{$name}%")->OrderBy("pid")->paginate(5);
            $search['name'] = $name; // 条件放进数组
        }else{
            //没有进行搜索
            $data = Goods::where("pid","!=",0)->where("status","=",0)->OrderBy("pid")->paginate(5);
        }
        $types = Goods::where("pid","=",0)->get();
        $type = [];
        foreach ($types as $k => $v) {
            $type[$v->id] = $v->name;
        }
        return view('admin.goods_list_off')->with(['data'=>$data])->with(["type"=>$type])->with(["search"=>$search]);
    }

    /**
     * 添加型号和颜色
     *
     * @return 返回上一视图
     */
    public function addSkus (Request $request)
    {
        $skus = new Skus();
        $data = $request->only("attr","color","goods_id","price","num");
        $skus->insert($data);
        return back();
    }

    /**
     * 型号和颜色
     *
     * @return 返回上一视图
     */
    public function skusList (Request $request)
    {
        $skus = new Skus();
        $skus = $skus->paginate(10);
        $goods = [];
        foreach ($skus as $sku) {
            $goods[$sku->id] = $skus->find($sku->id)->hasSkus()->first();
        }
        return view('admin.skus_list')->with(['skus'=>$skus])->with(['goods'=>$goods]);
    }


    public function updateSkus (Request $request)
    {
        $id = $request->id;
        $sku = Skus::find($id);
        $sku->price = $request->price;
        $sku->num = $request->num;
        $sku->save();
        return back();
    }


    public function toggleSkus (Request $request)
    {
        $id = $request->id;
        // 执行下架操作
        $sku = Skus::find($id);
        if ($sku->status == 1) {
            $sku->status = '0';
        } else {
            $sku->status = '1';
        }
        $sku->save();
        return back();
    }
}
