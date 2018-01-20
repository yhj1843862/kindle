<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * 订单列表
     * @param Request $request
     * @return $this
     */
    public function order_lists(Request $request)
    {
        if ($request->isMethod('get')) {
            $data = DB::table('order')
                ->join('user', 'order.user_id', '=', 'user.user_id')
                ->select('order.*', 'user.nickname');
            $count = $data->count();
            $page = $data->paginate(10);
            return view('Admin/Order/order_lists')->with('num', $count)->with('page', $page);
        }

    }

    public function order_del($id)
    {
        //strpos() 函数查找字符串.
        if (strpos($id, ',') === false) {
            $data = DB::delete("delete from kd_order where order_id =" . $id);
        } else {
            $id = explode(",", $id);
            $data = DB::table('order')->whereIn('order_id', $id)->delete();
            //            return $data;
        }
        if ($data) {
            exit(json_encode(["status" => 0, 'msg' => "删除成功"]));
        } else {
            echo json_encode(["status" => 1, 'msg' => "删除失败!!"]);
        }

    }
}
