<?php

namespace App\Http\Controllers\Admin\book;

use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BookaddController extends Controller
{
    /**书籍添加
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */

    public function Bookadd(Request $request)
    {
        if ($request->isMethod('get')) {

            $res = DB::select('select * from kd_category');
            $data['list'] = $res;
            $pub = DB::select('select * from kd_publish');
            $info['in'] = $pub;
            $type =DB::select('select * from kd_type');
            $msg['new'] = $type;
//            dd($msg);
            return view('Admin/Book/bookadd', $data)->with($info)->with($msg);
        }

                if ($request->isMethod('post')) {

            $data = $request->all();
//            dd($data);

            //验证
            $validator = Validator::make($request->input(),[
                'book_name' => 'required',
                'author' => 'required|between:2,30',
                'category' => 'required',
                'publish' => 'required',
                'price' => 'required|between:1,11'
            ]);
            //保存报错信息
            if($validator->fails()){
                return redirect()->back();
        }

            if ($request->file('thumb')->isValid()) {
                $path = "./uploads/" . date('Ymd') . '/';
                if (!file_exists($path)) mkdir($path, 0777);
                $filename = date('YmdHis') . rand(100, 999) . '.' . explode('/', $request->file('thumb')->getMimeType())[1];
                $request->file('thumb')->move($path, $filename);
                $filepath = $path . $filename;
                $data['thumb'] = $filepath;
//                dd($data);
            } else {
                echo '上传失败';
            }
            $thumb = explode('.',$data['thumb']);
            $data['thumb'] = $thumb[1];
            $book_name = DB::table('book');
            $info = $book_name->insert($data);

            if ($info) {
                echo '<script>parent.location.reload()</script>';
//                return ['status'=>1, 'info'=>'成功'];
            } else {
                return ['status' => 0, 'info' => '失败'];
            }

        }
    }


    /**
     * 书单删除
     */
    public function Bookdel($id)
    {
        if (strpos($id, ",") === false) {
            $res = DB::delete('delete from kd_book where book_id = ' . $id);
        } else {
            $id = explode(',', $id);
            $res = DB::table('book')->whereIn('book_id', $id)->delete();
        }

        if (!$res) {
            exit(json_encode(["status" => 1, 'msg' => "删除失败"]));
        }
        echo json_encode(['status' => 0, 'msg' => "删除成功"]);
    }

    /**书单编辑
     * @param Request $request
     * @param $id
     * @return $this|array
     */
    public function Bookedit(Request $request, $id)
    {
        if ($request->isMethod('get')) {

            $cate = DB::select('select * from kd_category');
            $inf['cate'] = $cate;
            $pub = DB::select('select * from kd_publish');
            $info['in'] = $pub;
            $type =DB::select('select * from kd_type');
            $msg['new'] = $type;
            $res = DB::table('book')->where('book_id', '=', $id)->get();
            $data['list'] = $res;
            return view('Admin/Book/bookedit', $data)->with($info)->with($inf)->with($msg);

        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            $res = DB::table('book')->where('book_id', $id)->update($data);

            if (!$res) {
                return ['status' => '0', 'info' => '更新失败'];
            } else {
                return ['status' => '1', 'info' => '更新成功'];
            }
        }

    }
}
