<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class bookcateController extends Controller
{

    /**
     * 前台导航--图书分类
     * @param $cate_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lists1($cate_id = 1)
    {
        if (empty(session('user_info'))){
            $nickname = '';
        }else{
            $nickname = session('user_info')['nickname'];
        }

        $res1=DB::select('select * from kd_category');
        $res = DB::table('book')->where('category','=',$cate_id)->paginate(2);

        $data['list1'] = $res1;
        $data['list'] = $res;
        if (count($data['list']) == 0)
        {
            return view('404')->with(['error'=>'该类书籍下没有书籍','url'=>'book_cate']);
        }
        return view('Home/Index/book_cate',$data)->with(['nickname'=>$nickname]);
    }

}
