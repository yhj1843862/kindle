<?php

namespace App\Http\Controllers\Admin\power;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{


    public function power_lists(Request $request)
    {
        if (!session('user_info'))
        {
            return redirect('adminlogin');
        }
        $powers = DB::table('role')->get();
        $roles = [];
        foreach ($powers as $v) {
            array_push($roles, $v);
        }
        $data['lists'] = $roles;

        return view('Admin/Power/power_lists', $data);
    }

    public function role_node(Request $request,$id)
    {
        if ($request->isMethod('get')) {
            $roleInfo = DB::table('role')->where('role_id', $id)->get();

            $role = [];
            foreach ($roleInfo[0] as $k => $v)
            {
                $role[$k] = $v;
            }
            $roleId['role_id'] = $role;


            $nodes = DB::table('node')->get();
//            dump($nodes);
            $getNodes = DB::table('role_node')->where('role_id',$id)->pluck('node_id');
//            print_r($nodes);
//            dump($getNodes);
            foreach ($nodes as $k=>$v)
            {
//                dump($v);
                $nodes[$k] =  get_object_vars($v);
//                dump($nodes[$k]);
                if (in_array($nodes[$k]['id'], $getNodes)) {
                    $nodes[$k]['nodes'] = 1;
                } else {
                    $nodes[$k]['nodes'] = 0;
                }
            }
//            dump($nodes);
            $nodeInfo['data'] = $nodes;

            return view('Admin/Power/role_node',$nodeInfo)->with($roleId);
        }


        if ($request->isMethod('post'))
        {
            $data = $request->all();
//            dump($data) ;

            if (empty($data['node_id']))
            {
                echo "<script>alert('您没有选择任何权限');window.history.go(-1);</script>";
                exit();
            }
            if (empty($data['role_id']))
            {
                echo "<script>alert('非法添加权限');window.history.go(-1);</script>";
                exit();
            }
//            dump($data);
            $list =[];
            foreach ($data['node_id'] as $k=>$v){
                $list[$k]['node_id']  =$v;
                $list[$k]['role_id']  =$data['role_id'];
            }
//            dump($list);
            DB::table('role_node')->where('role_id',$data['role_id'])->delete();
            $mySql = DB::table('role_node')->insert($list);
            if ($mySql)
            {
                echo "<script>alert('权限添加成功');window.history.go(-1);</script>";
                exit();
            }
        }
    }

    public function add_node(Request $request)
    {
        if ($request->isMethod('post')){
            $nodeInfo = $request->all();
//            return $nodeInfo;
            if ($nodeInfo['node_name'] == null){
                return ['status'=>0,'info'=>'节点名称不能为空'];
            }

            if ($nodeInfo['routes'] == null)
            {
                return ['status'=>0, 'info'=>'所属路由名称不能为空'];
            }
//
            $node = DB::table('node')->insert($nodeInfo);
            if ($node){
                return ['status'=>1,'info'=>'节点添加成功'];
            }else{
                return ['status'=>0,'info'=>'添加失败'];
            }
        }
        return view('Admin/Power/add_node');
    }


}
