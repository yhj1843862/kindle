<?php

namespace App\Http\Controllers\Admin\book;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BooklistController extends Controller
{
    /**书籍列表
     * @param Request $request
     * @return $this
     */
    public function Booklist(Request $request)
    {
        $res = $request->all();
        $books = DB::table('book')
                    ->join('category','book.category','=','category.cate_id')
                    ->join('publish','book.publish','=','publish.publish_id');
        $count = $books->count();
        if (!empty($res['search']))
        {
            $cate = $books->where('cate_name','like',$res['search'].'%')->orWhere('book_id','like',$res['search'].'%')->paginate(8);
        }else{
            $cate = $books->paginate(8);
        }
//        dd($cate);
        $data['list'] = $cate;
        return view('Admin/Book/booklist',$data)->with('num',$count);


    }
}
