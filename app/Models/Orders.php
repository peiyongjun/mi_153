<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class Orders extends Model
{
    /*
     *订单查询
     */ 
    protected $table = 'orders';
    public function getAllorder()
    {
    	$data = \DB::table('orders')
            ->join('users','users.id','=','orders.user_id')
            ->join('goods','goods.id','=','orders.goods_id')
            ->select('orders.*','users.username','goods.name');
            return $data;
    }
}