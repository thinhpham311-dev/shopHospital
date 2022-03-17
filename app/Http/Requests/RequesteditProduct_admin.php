<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequesteditProduct_admin extends FormRequest
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
            'name'=>'required|max:150',
            'unit_price'=>'required|integer',
            'promotion_price'=>'required|integer',
            'inventory_number'=>'required|integer',
            'describe'=>'required'
           
        ];
    }
     public function messages()
    {
        return[
           'name.required'=>'Tên sản phẩm không được bỏ trống',
           'name.max'=>'Tên sản phẩm không vượt quá 150 ký tự',
           'unit_price.required'=>'Vui lòng nhập giá gốc sản phẩm',
           'unit_price.integer'=>'Giá thực phải là số',
           'promotion_price.required'=>'Vui lòng nhập giá khuyến mãi',
           'promotion_price.integer'=>'Giá khuyến mãi phải là số',
           'inventory_number.required'=>'Số lượng tồn không được bỏ trống',
           'inventory_number.integer'=>'Số lượng tồn phải là số',
          
           'describe.required'=>'Vui lòng nhập mô tả sản phẩm',
       
         
        ];
    }
}
