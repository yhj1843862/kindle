<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class xxxRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'book_name' => 'required',
            'author' => 'required|between:2,30',
            'cate_name' => 'required',
            'publish' => 'required',
            'price' => 'required|between:1,11'
        ];
    }

    public function messages(){
        return [

            'book_name.required' => '书名不能为空',
            'author.required' => '必须填写作者',
            'cate_name.required' => '请选择分类',
            'publish.required' => '请选择出版社',
            'price.required' => '商品价格不合理'

        ];
    }


}
