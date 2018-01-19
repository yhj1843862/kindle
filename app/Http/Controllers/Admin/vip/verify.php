<?php

namespace App\Http\Controllers\Admin\vip;

use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class verify extends Controller
{
    //
    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '$data[name]' => 'required|bail|max:10|min:2',
            '$data[phone]' => 'required|digits:11|',
            '$data[level]' => 'required|max:4',
        ]);
    }
}
