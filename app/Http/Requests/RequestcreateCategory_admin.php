<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class RequestcreateCategory_admin extends FormRequest
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
            'image'=>'required',
            'image_banner'=>'required'
        ];
    }
    public function messages()
    {
        return[
          'name.required'=>'Vui lòng nhập tên danh mục',
          'name.unique'=>'Tên danh mục loại sản phẩm đã tồn tại',
          'name.max'=>'Tên danh mục không vượt quá 150 ký tự',
          'image.required'=>'Vui lòng chọn hình mô tả',
          'image_banner.required'=>'vui lòng chọn hình quảng cáo'
         
        ];
    }
}
