<?php

namespace App\Http\Controllers\Home\Index;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Index extends Controller
{
    //
    public function Index()
    {
        $data = DB::table('book')
            ->join('category', 'book.category', '=', 'category.cate_id')
            ->select('book.*', 'category.cate_name')
            ->get();
        $arr = DB::table('set')->get();
        $datas =  DB::table('book')->where('type','=','2')->limit(9)->get();
//        dump($datas);
        return view('Home/Index/index')->with(['data'=>$data,'arr'=>$arr,'datas'=>$datas]);
    }


}
