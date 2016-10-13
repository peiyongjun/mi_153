<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skus extends Model
{
    //
    protected $table = "skus";

    public function hasManySkus()
    {
        return $this->belongsTo('App\Models\Orders', 'goods_id', 'id');
    }

     public function hasSkus ()
    {
        return $this::hasMany('App\Models\Goods','id','goods_id');
    }
    /**
     * 关联skus表
     * 
     * @return Object  $list    查询到的数据
     */
    public function hasOneSkus()
    {
        return $this->belongsTo('App\Models\Goods', 'id', 'goods_id');
    }
}
