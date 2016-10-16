<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = "service";

    public function hasManyOrders()
    {
    	return $this->hasMany("App\Models\Orders", "id", "order_id");
    }
}
