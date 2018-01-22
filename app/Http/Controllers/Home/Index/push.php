<?php

namespace App\Http\Controllers\Home\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class push extends Controller
{

    /**
     * 推送须知
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function push(){
        if (empty(session('user_info'))){
            $nickname = '';
        }else{
            $nickname = session('user_info')['nickname'];
        }
        return view('Home/Index/push')->with(['nickname'=>$nickname]);
    }
}
