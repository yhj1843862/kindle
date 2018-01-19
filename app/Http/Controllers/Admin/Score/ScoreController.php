<?php

namespace App\Http\Controllers\Admin\Score;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            return view("Admin/Score/add_score");
        }
        if ($request->isMethod('post')) {
            $data = $request->all();

            $res = DB::table('score');
            $info = $res->insert($data);
            if ($info) {
                return ['status' => 1, 'info' => '成功'];
            } else {
                return ['status' => 0, 'info' => '失败'];
            }
        }
    }

    public function lists()
    {
        $sc_lists = DB::table('user')->leftJoin('order','user.user_id','=','order.user_id')->paginate(2);
        return view('Admin/Score/score_lists')->with('sc_lists',$sc_lists);

    }
}
