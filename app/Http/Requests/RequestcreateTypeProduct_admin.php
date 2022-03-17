<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestcreateTypeProduct_admin extends FormRequest
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
          
            'name'=>'required|unique|max:150',
            'description'=>'required',
            'id_category'=>'required',
            'image'=>'required'
        ];
    }
     public function messages()
    {
        return[
           'name.required'=>'Loại sản phẩm không được bỏ trống.',
            'name.unique'=>'Loại sản phẩm đã có tồn tại',
            'name.max'=>'Loại sản phẩm không vượt quá 150 ký tự',
            'description.required'=>'Vui lòng nhập mô tả loại sản phẩm',
            'id_category.required'=>'Vui lòng chọn danh mục sản phẩm',
            'image.required'=>'Chọn hình ảnh loại sản phẩm'
        ];
    }
}
