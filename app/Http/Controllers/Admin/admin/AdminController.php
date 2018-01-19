<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * 添加管理员
     * @param Request $request
     * @return $this|array
     */
    public function add_admin(Request $request)
    {
        if ($request->isMethod('post')) {
            $res = $request->all();
            if ($res['nickname'] == null) {
                return ['status' => 0, 'info' => '请输入用户昵称!!'];
            }
            if (strlen($res['pswd']) > 16 || strlen($res['pswd']) < 5) {
                return ['status' => 0, 'info' => '密码格式不正确!'];
            }
            if (!preg_match('/^\w+@\w+\.\w+$/', $res['email']) || empty($res['email'])) {
                return ['status' => 0, 'info' => '请输入正确的邮箱'];
            }
            $url = env('URL');
            $k_email = explode('@', $request->get('email'));
            $k_email = $k_email[0] . '@' . $url;
            $res['k_email'] = $k_email;
            $res['pswd'] = password_hash($res['pswd'], PASSWORD_DEFAULT);
            $data = DB::table('user');
            $info = $data->insert($res);
            if ($info) {
                return ['status' => 1, 'info' => '成功'];
            } else {
                return ['status' => 0, 'info' => '失败'];
            }
        }
        return view('Admin/Admin/add_admin')->with('page_title', '添加管理员');
    }

    /**
     * 管理员列表
     * @param Request $request
     * @return $this
     */
    public function admin_list(Request $request)
    {
        $roles = DB::table('user')
            ->join('role', 'role.role_id', '=', 'user.role')
            ->select('user.*', 'role.role_name')
            ->where('role', '<=', 2)
            ->paginate(2);
//        print_r($roles);
        $data['admins'] = $roles;
        return view('Admin/Admin/admin_list')->with($data);
    }

    public function del($id)
    {
        //strpos() 函数查找字符串.
        if (strpos($id, ',') === false) {
            $data = DB::delete("delete from kd_user where user_id =" . $id);
        } else {
            $id = explode(",", $id);
            $data = DB::table('user')->whereIn('user_id', $id)->delete();
            //return $data;
        }
        if ($data) {
            exit(json_encode(["status" => 1, 'msg' => "删除成功"]));

        } else {
            echo json_encode(["status" => 0, 'msg' => "删除失败!!"]);
        }
    }
}
