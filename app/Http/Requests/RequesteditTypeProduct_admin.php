<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequesteditTypeProduct_admin extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'image'=>'required'
        ];
    }
     public function messages()
    {
        return[
            'name.required'=>' Tên loại sản phẩm không được bỏ trống.',
            'name.unique'=>'Tên loại sản phẩm đã có tồn tại',
            'name.max'=>'Tên loại sản phẩm không vượt quá 150 ký tự',
            'description.required'=>'Vui lòng nhập mô tả loại sản phẩm',
            'image.required'=>'Vui lòng chọn hình loại sản phẩm'
        ];
    }
}
