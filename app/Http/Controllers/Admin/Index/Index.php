<?php

namespace App\Http\Controllers\Admin\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Index extends Controller
{
    public function index()
    {

        $user_info = session('user_info');
        return view('Admin/Index/index')->with(['user_info'=>$user_info,'page_title'=>'后台首页']);

    }
}
