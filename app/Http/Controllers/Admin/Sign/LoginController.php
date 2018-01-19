<?php

namespace App\Http\Controllers\Admin\Sign;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * 后台登录
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        if (session('user_info')) {
            //如果用户已经登录，则不能访问登录方法
            return redirect('admin');
        }
        if (session('user_info')) {
            //如果用户已经登录，则不能访问登录方法
            return redirect()->action('Admin/Index/index');
        }
        if ($request->isMethod('get')) {
            return view('Admin/Sign/login');
        }
        if ($request->isMethod('post')) {
            $input = $request->all();
            if (empty($input['email'])) {
                return view('404')->with(['error' => '用户名不能为空', 'url' => 'adminlogin']);
            }
            if (empty($input['pswd'])) {
                return view('404')->with(['error' => '密码不能为空', 'url' => 'adminlogin']);
            }

            //验证码
//            if (empty($input['j_verify'])) {
//                return view('404')->with(['error' => '验证码不能为空', 'url' => 'adminlogin']);
//            }
//            $code = session('milkcaptcha');
//            if ($code != $input['j_verify']) {
//                //用户输入验证码错误
//                return view('404')->with(['error' => '验证码不正确', 'url' => 'adminlogin']);
//            }

            $db = DB::table('user');
            $res = $db->where('email', $input['email'])->select('email', 'pswd', 'nickname', 'role', 'k_email')->get();
            $res = get_object_vars($res[0]);
            if (empty($res)) {
                return view('404')->with(['error' => '该用户不存在', 'url' => 'adminlogin']);
            }
            if (!$res) {
                return view('404')->with(['error' => '输入用户不正确', 'url' => 'adminlogin']);
            }
            if (!password_verify($input['pswd'], $res['pswd'])) {
                return view('404')->with(['error' => '密码不正确', 'url' => 'adminlogin']);
            }
            //获取用户的角色信息
            $role_name = DB::table('role')->where(['role_id' => $res['role']])->get();
            $role_name = get_object_vars($role_name[0])['role_name'];
            $res['role_name'] = $role_name;

            //写入 session
            session(['user_info' => $res]);
            //跳转至后台首页
            return view('success')->with(['success' => '登录成功', 'url' => 'admin']);
            exit();
        }
    }

    /**
     *
     * 退出登录
     *
     */
    public function logout(Request $request)
    {
        if (!session('user_info')) {
            //如果用户没有登录，则不能退出方法
            return redirect('adminlogin');
        }
        //清除 session
        session(['user_info' => '']);
        return redirect('adminlogin');
    }
}
