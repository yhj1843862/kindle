<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class booklistsController extends Controller
{
    //
    public function lists(Request $request)
    {
        $res = DB::table('book')->paginate(4);
//        print_r($res);
        $data['list'] = $res;
        return view('Home/Index/book_lists',$data);
    }

    public function lists1(Request $request,$id=0)
    {
        $res = DB::table('book')->where('type','=',$id)->paginate(4);
        $data['list'] = $res;
        return view('Home/Index/book_lists',$data);
    }

    /**
     * 点赞
     */
    public function click(Request $request){
        $id = $request->get('id');
        $num = DB::table('book')->where('book_id','=',$id)->increment('click');
        return ['id'=>$id,'num'=>$num];
    }
}
