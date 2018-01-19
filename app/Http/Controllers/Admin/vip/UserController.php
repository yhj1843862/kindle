<?php

namespace App\Http\Controllers\Admin\vip;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            $res = DB::select('SELECT * FROM kd_vip');
//            print_r($res);
            $user_list = [];
            foreach ($res as $v) {
                //将一个或多个单元压入数组的末尾
                //返回处理之后数组的元素个数。
                array_push($user_list, $v);
            }
            $data['lists'] = $user_list;
            return view('Admin/VIP/add_vip', $data);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            $this->validate($request, [
                'nickname' => 'required|bail|between:2,10',
                'email' => 'required|email|unique:vip',
                'level' => 'required',
            ]);
            $v_users = DB::table('vip');
            $info = $v_users->insert($data);
            if ($info) {
                return ['status' => 1, 'info' => '成功'];
            } else {
                return ['status' => 0, 'info' => '失败'];
            }
        }
    }

    public function lists()
    {
        $users = DB::table('vip')->paginate(5);
        return view('Admin/VIP/vip_lists')->with('users', $users);
    }
}



