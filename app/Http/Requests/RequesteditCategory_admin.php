<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequesteditCategory_admin extends FormRequest
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
            'description'=>'required',
           
        ];
    }
     public function messages()
    {
        return[
          'name.required'=>'Vui lòng nhập tên danh mục',
          'name.max'=>'Tên danh mục không vượt quá 150 ký tự',
          'description.required'=>'Vui lòng nhập mô tả danh mục',

         
        ];
    }
}
