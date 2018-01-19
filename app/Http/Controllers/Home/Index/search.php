<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class search extends Controller
{
    public function search(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $data=$request->all();
            $res=DB::table('book');
            $res1 = $res->where('book_name', 'like','%'. $data['search']. '%')->get();
        }
//        print_r($res1);
        return view('Home/Index/search',['info'=>$res1]);

    }

}
