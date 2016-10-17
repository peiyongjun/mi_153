<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $tables = "comments";
    public $timestamps = false;

    public function hasManyUsers ()
    {
    	return $this->hasMany("App\Models\Users","id","user_id");
    }

    public function hasManyOrders ()
    {
    	return $this->hasMany("App\Models\Orders","id","order_id");
    }

    public function hasMSkus()
    {
    	return $this->hasMany("App\Models\Skus","id","skus_id");
    }

    public function hasManyGoods()
    {
    	return $this->hasMany("App\Models\Goods","id","goods_id");
    }
}
