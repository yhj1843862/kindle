<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class User extends Controller
{
    public function lists()
    {
        $Userlist = DB::table('user')
                    ->join('role','role.role_id', '=', 'user.role')
                    ->select('user.*','role.role_name')
                    ->where('role', '>',2)
                    ->paginate(2);
//        print_r($Userlist);
        return view('Admin/User/userList')->with(['Userlist'=>$Userlist,'page_title'=>'用户列表']);
    }

    public function del($id)
    {
        if (strpos($id,',') === false)
        {
            $data = DB::delete("delete from kd_user where user_id =".$id);
        }else{
            $id = explode(",",$id);
            $data = DB::table('user')->whereIn('user_id',$id)->delete();
//            return $data;

        }

        if (!$data)
        {
            exit(json_encode(["status"=>1,'msg'=>"删除失败"]));
        }else{
            echo json_encode(["status"=>0,'msg'=>"删除成功!!"]);
        }



    }
}
