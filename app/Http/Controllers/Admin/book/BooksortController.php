<?php

namespace App\Http\Controllers\Admin\book;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BooksortController extends Controller
{
    /**类目列表
     * @param Request $request
     * @return $this
     */
    public function Booksort(Request $request)
    {
        $res = $request->all();
        $books = DB::table('book')->leftJoin('category','book.category','=','cate_id');
//        dd($books);
        $count = $books->count();
        if (!empty($res['search']))
        {
            $cate = $books->where('cate_name','like',$res['search'].'%')->orWhere('book_id','like',$res['search'].'%')->paginate(8);

        }else{
            $cate = $books->paginate(8);
        }
        $data['list'] = $cate;
        return view('Admin/Book/booksort',$data)->with('num',$count);
    }

    /**类目删除
     * @param $id
     */
    public function Sortdel($id)
    {
        if (strpos($id,",") === false)
        {
            $res = DB::delete('delete from kd_book where book_id = ' .$id);
        }else{
            $id = explode(',',$id);
            $res = DB::table('book')->whereIn('book_id',$id)->delete();
        }

        if(!$res)
        {
            exit(json_encode(["status"=>1,'msg'=>"删除失败"]));
        }
        echo json_encode(['status'=>0,'msg'=>"删除成功"]);

    }


    public function Sortadd(Request $request)
    {
        if ($request->isMethod('get'))
        {
            return view('Admin/Book/Sortadd');
        }


        if ($request->isMethod('post'))
        {
            $data = $request->all();
            $this->validate($request,[
                'cate_name'=>'required|between:2,30',
            ]);
            $res = DB::table('category');
            if ($res->insert($data))
            {
                   return ['status'=>1, 'info'=>'提交成功'];
            }else{
                return ['status'=>0, 'info'=>'提交失败'];
            }


        }

    }

}
