<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Users extends Model
{
    //指定表名为users
    protected $table = "users";
    public $timestamps = false;

    /**
     * 验证管理员登陆
     * 
     * @param  Request $request [表单提交的信息]
     * @return Object  $db      [对象信息]
     */
    public function checkAdmin (Request $request)
    {
    	//验证用户名密码是否正确 
		$name = $request->input('username');
		$pass = $request->input('password');
		$db = Users::where("username",$name)->where("status","9")->first();
		if($db){
			if ($db->password == md5($pass)) {
				return $db;//返回当前对象
			}
		}
		return null;//用户名 密码不存在都返回空
    }

    public function checkUser (Request $request)
    {
        //验证用户名密码是否正确 
        $name = $request->input('user');
        $pass = $request->input('pwd');
        $db = Users::where("username",$name)->where("status","!=","0")->first();
        if($db){
            if ($db->password == md5($pass)) {
                return $db;//返回当前对象
            }
        }
        return null;//用户名 密码不存在都返回空
    }
}
