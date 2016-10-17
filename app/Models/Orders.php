<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class Orders extends Model
{
    /*
     *订单查询
     */ 
    protected $table = 'orders';
    public $timestamps = false;
    
    public function getAllorder()
    {
    	$data = \DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->join('goods','goods.id','=','orders.goods_id')
            ->select('orders.*','users.username','goods.name');
            return $data;
    }

    public function hasManySkus()
    {
        return $this->hasMany("App\Models\Skus", "id", "goods_id");
    }    

    public function hasManyOrders()
    {
        return $this->belongsTo("App\Models\Service", "order_id", "id");
    }

    public function hasManyUsers()
    {
        return $this->hasMany("App\Models\Users", "id", "user_id");
    }

}