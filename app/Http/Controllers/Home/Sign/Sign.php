<?php

namespace App\Http\Controllers\Home\Sign;

use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

//引用对应的命名空间
class Sign extends Controller
{

    /**
     * 注册
     */
    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('Home/Sign/sign');
        }
        if ($request->isMethod('post')) {
            $input = $request->all();

            if (empty($input['email'] || empty($input['pswd']))) {
                return view('404')->with(['error' => '用户名或密码错误', 'url' => 'register']);
            }
            $user = DB::table('user')->where('email', $input['email'])->first();
            if (!empty($user)) {
                return view('404')->with(['error' => '该用户已存在', 'url' => 'register']);
            }
            if ($input['pswd'] != $input['repswd']) {
                return view('404')->with(['error' => '两次密码不一致', 'url' => 'register']);
            }

            $nickname = '书虫' . rand(1000000, 9999999);
            $input['pswd'] = password_hash($input['pswd'], PASSWORD_DEFAULT);
            if (!preg_match('/\w+@\w+\.\w{2,10}/', $input['email'])) {
                return view('404')->with(['error' => '请输入正确的邮箱', 'url' => 'register']);
            }
            $nick = DB::table('user')->where('nickname', $nickname)->first();
            if (!empty($nick)) {
                $nickname = '书虫' . rand(1000000, 9999999);
            }
            $input['nickname'] = $nickname;

            $url = env('URL');
            $url1 = env('URL1');
            $k_email = explode('@', $input['email']);
            $d_email = $k_email[0] . "@" . $url1 ;
            $k_email = $k_email[0] . "@" . $url;
            $input['k_email'] = $k_email;
            $input['d_email'] = $d_email;
            //去除$ $input['repswd']
            unset($input['repswd']);
            //连接数据库
            $db = DB::table('user');
            if ($db->insert($input)) {
                return view('success')->with(['success' => '注册成功', 'url' => 'index']);
            } else {
                return view('404')->with(['error' => '注册失败', 'url' => 'register']);
            }
        }
    }

    /**
     * 登录
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(Request $request)
    {
        if(session('user_info'))
        {
            //如果用户已经登录，则不能访问登录方法
            return view('404')->with(['error'=>'您已经登录过,无须再次登录','url'=>'/']);
        }
        if ($request->isMethod('get')) {
            return view('Home/Sign/sign');
        }
        if ($request->isMethod('post')) {
            $input = $request->all();
            //dump($input);
            if (empty($input['email']) || empty($input['pswd'])) {
                return view('404')->with(['error' => '用户名或密码错误', 'url' => 'login']);
            }
            $db = DB::table('user');
            $res = $db->where('email', $input['email'])->select('*')->get();
            $res = get_object_vars($res[0]);
            if (empty($res)) {
                return view('404')->with(['error' => '该用户不存在', 'url' => 'login']);
            }
            if (!$res) {
                return view('404')->with(['error' => '输入用户不正确', 'url' => 'login']);
            }
            if (!password_verify($input['pswd'], $res['pswd'])) {
                return view('404')->with(['error' => '密码不正确', 'url' => 'login']);
            }
            //获取用户的角色信息
            $role_name =  DB::table('role')->where(['role_id'=>$res['role']])->get();
            $role_name = get_object_vars($role_name[0])['role_name'];
            $res['role_name'] = $role_name;
            //写入 session
            session(['user_info' => $res]);
//            dump(session('user_info'));
            return view('success')->with(['success' => '登录成功', 'url' => 'index']);
            exit();
        }
    }

    /**
     * 验证码图片
     * @param $tmp
     */
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session(['milkcaptcha' => $phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    /**
     * 验证验证码
     * @param Request $request
     * @return array
     */
    public function do_verify(Request $request)
    {
        $code = session('milkcaptcha');
        $verify = $request->input('code');
//        return [$code,$verify];
        if ($code == $verify) {
            //用户输入验证码正确
            return ['status'=>1,'info'=>'您输入验证码正确','msg'=>$code];
        } else {
            //用户输入验证码错误
            return ['status'=>0,'info'=>'您输入验证码错误,请重新输入','msg'=>$code];
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
            return redirect('exit');
        }
        //清除 session
        session(['user_info' => '']);
        return redirect('/');
    }
}
