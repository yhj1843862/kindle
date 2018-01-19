<?php

namespace App\Http\Controllers\Admin\power;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{

    public function power_lists(Request $request)
    {
        $powers = DB::table('role')->get();
        $roles = [];
        foreach ($powers as $v) {
            array_push($roles, $v);
        }
        $data['lists'] = $roles;
        return view('Admin/Power/power_lists', $data);
    }

    public function role_node(Request $request)
    {
        if ($request->isMethod('get')) {

        }
        return view('Admin/Power/role_node');
    }


}
