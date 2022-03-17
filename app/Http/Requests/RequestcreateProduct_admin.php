<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestcreateProduct_admin extends FormRequest
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
            'name'=>'required',
            'unit_price'=>'required|integer',
            'inventory_number'=>'required',
            'date_start'=>'required',
            'describe'=>'required',
            'image'=>'required',
           
        ];
    }
     public function messages()
    {
        return[
           'name.required'=>'Tên sản phẩm không được bỏ trống',
           // 'name.unique'=>'Tên sản phẩm đã tồn tại',
           'name.max'=>'Tên sản phẩm không vượt quá 30 ký tự',
           'unit_price.required'=>'Vui lòng nhập giá gốc sản phẩm',
           'unit_price.integer'=>'Giá thực phải là số',
          
           'inventory_number.required'=>'Số lượng tồn không được bỏ trống',
        
         
           'date_start.required'=>'Chưa chọn ngày sản xuất cho sản phẩm',
           'describe.required'=>'Vui lòng nhập mô tả sản phẩm',
           'image.required'=>'Vui lòng chọn hình cho sản phẩm'
        ];
    }
}
