<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Goods extends Model
{
     //指定表名为users
    protected $table = "goods";

    /**
     * 查询所有大类
     * 
     * @return Object  $list     查询到的数据
     */
    public function getType ()
    {
    	$list = Goods::where("pid","0")->get();
    	return $list;
    }

    /**
     * 查询所有商品
     * 
     * @return Object  $list    查询到的数据
     */
    public function getAll ()
    {
    	$list = Goods::where("pid","!=","0")->get();
    	return $list;
    }

    /**
     * 关联skus表
     * 
     * @return Object  $list    查询到的数据
     */
    public function hasSkus()
    {
        return $this->belongsTo('App\Models\Skus', 'goods_id', 'id');
    }
    
    /**
     * 关联skus表
     * 
     * @return Object  $list    查询到的数据
     */
    public function hasOneSkus()
    {
        return $this->hasOne('App\Models\Skus', 'goods_id', 'id');
    }
}
