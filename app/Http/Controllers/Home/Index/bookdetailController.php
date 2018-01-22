<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class bookdetailController extends Controller
{
    /**
     * 书籍详情页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request,$id=null)
    {

        if (empty(session('user_info'))){
            $nickname = '';
        }else{
            $nickname = session('user_info')['nickname'];
        }

        $detail = DB::table('book')->where('book_id','=',$id)
            ->leftJoin('category','book.category','=','category.cate_id')
            ->leftJoin('type','book.type','=','type.type_id')->get();

        $data['list'] = $detail;
        $arr = DB::table('set')->get();
        return view('Home/Index/book_detail',$data)->with(['nickname'=>$nickname,'arr'=>$arr]);

    }

    public function collect(Request $request)
    {
        if($request->isMethod('post'))
        {
            //todo 验证用户是否已登录
            if(empty(session('user_info'))){
                return ['status'=>2,'info'=>'请还没有登录,请前往登录页面!!'];
            }
            $book_id = $request->id;
            $data = DB::table('collect')->where('user_id','=',session('user_info')['user_id'])->get();
            foreach ($data as $v)
            {
                if($book_id == $v->book_id)
                {
                    return ['status'=>1,'info'=>'您已收藏过该书'];
                }
            }
            $res = DB::table('collect')
                ->insert(['book_id'=>$book_id,'user_id'=>session('user_info')['user_id']]);
            if ($res)
            {
                return ['status'=>1, 'info'=>'收藏成功'];
            }else{
                return ['status'=>0,'info'=>'收藏失败'];
            }

        }

    }

}
