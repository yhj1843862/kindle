<?php

namespace App\Http\Controllers\Admin\Score;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    /**
     * 积分列表
     * @return $this
     */
    public function lists()
    {
        $sc_lists = DB::table('score')
            ->join('user','user.user_id','=','score.user_id')
            ->select('score.*','user.nickname','user.email')
            ->paginate(5);
//        dump($sc_lists);
        return view('Admin/Score/score_lists')->with('sc_lists',$sc_lists);

    }
}
