<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Users;//使用users表类
class UserListController extends Controller
{
    /**
     * 所有用户信息查询
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        $search = [];
        if($request->has('name')){
            $name = $request->input('name');
            $info = Users::where("username","like","%{$name}%")->orderBy("status","desc")->orderBy("id",'desc')->paginate(15);
            $search['name'] = $name;
        }else{
            $info = Users::orderBy("status","desc")->orderBy("id",'desc')->paginate(15);
        }
        // dd($info);
        return view("admin.user_list")->with(["info"=>$info])->with(["search"=>$search]);
    }
    public function toggleAccess (Request $request)
    {
        $id = $request->id;
        $db = Users::find($id);
        // dd($db);
        if ($db->status == 1) {
            $db->status = '0';
        } else if($db->status == 0) {
            $db->status = '1';
        }
        $db->save();
        return back();
    }
    /**
     * 删除用户数据
     * @param  int $id 接收到的id
     * @return None    跳回上一个页面
     */
    public function destroy($id)
    {
        // 执行删除 
        Users::find($id)->delete();
        return back();
    }
    /**
     * 新增管理员账号
     * @param  Request $request 表单数据
     * @return None          直接跳回上一个页面
     */
    public function store (Request $request)
    {
        $data = $request->only("username","password");//获取信息
        $data['password'] = md5($data['password']);//执行密码加密
        $data['status'] = 9;
        $id = Users::insert($data);//写入数据库
        return back();
    }
    /**
     * 修改用户信息
     * @param  Request $request 请求数据
     * @param  int  $id         接收到的id
     * @return None             上一页面
     */
    public function update (Request $request,$id)
    {
        $db = Users::find($id);
        //更新模型数据
        if ($request->input("password")) { //判断是否对密码做修改
            $db->password = md5($request->input("password")); 
        }
        $db->phone = $request->input("phone");//修改模型信息
        $db->email = $request->input("email");
        $db->save();
        return back();
    }
}