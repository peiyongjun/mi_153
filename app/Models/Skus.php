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
}
