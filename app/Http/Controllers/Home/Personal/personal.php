<?php

namespace App\Http\Controllers\Home\Personal;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class personal extends Controller
{
    public function person(Request $request){
        if (empty(session('user_info')) || (!session('user_info'))) {
            return view('404')->with(['error' => '您还没有登录,请先登录', 'url' => 'login']);
        }

        if ($request->isMethod('get')) {
            $data = session('user_info');
            $res = DB::table('collect')->select('book_id')->paginate(2);
            $page = $res;
            $list = [];
            $l =[];
            foreach ($res as $k=>$v)
            {
                $list[$k] = DB::table('book')->where('book_id','=',$v->book_id)->select('book_id','book_name','author')->get();
            }
            foreach ($list as $k=>$v){
                $l[$k] = reset($v);
            }
//            print_r($l);
            return view('Home/Personal/personal')->with(['data' => $data,'info'=>$l,'page'=>$page]);

        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            if (empty($data['nickname'])) {
                return view('404')->with(['error' => '昵称不能为空', 'url' => 'person']);
            }
            if (empty($data['oldpswd'])) {
                return view('404')->with(['error' => '旧密码不能为空', 'url' => 'person']);
            }
            if (empty($data['pswd'])) {
                return view('404')->with(['error' => '新密码不能为空', 'url' => 'person']);
            }
            if (empty($data['pswd'])) {
                return view('404')->with(['error' => '确认密码不能为空', 'url' => 'person']);
            }
            if($data['pswd'] != $data['repswd']){
                return view('404')->with(['error' => '两次密码不一致', 'url' => 'person']);
            }
            $res = DB::table('user')->where('user_id', '=', $data['user_id'])->get();
//            print_r($res);
            $res = get_object_vars($res[0]);
            if (!password_verify($data['oldpswd'], $res['pswd'])) {
                return view('404')->with(['error' => '您输入的旧密码不正确,无法修改', 'url' => 'person']);
            }
            if ($data['nickname'] == $res['nickname']){
                return view('404')->with(['error' => '该昵称已被占用,请重新修改', 'url' => 'person']);
            }
            $res = DB::table('user')
                ->where('user_id','=',$data['user_id'])
                ->update(['nickname'=>$data['nickname'],'pswd'=>$data['pswd']]);
//            var_dump($res);
//            dump($data);
            return view('Home/Personal/personal',$data);
        }

    }

}
