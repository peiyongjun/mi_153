<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $tables = "comments";

    public function hasManyUsers ()
    {
    	return $this->hasMany("App\Models\Users","id","user_id");
    }
}
