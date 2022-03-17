<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Edit_profileRequest extends FormRequest
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
            'name'=>'required|max:30',
            'email'=>'required|email',
            'phone'=>'required|integer',
            'address'=>'required|max:255',
            
        ];
    }
     public function messages()
    {
        return[
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.integer'=>'Số điện thoại chỉ nhập số',
            'address.required'=>'Vui lòng nhập đĩa chỉ',
            'address.max'=>'Địa chỉ không vượt quá 255 ký tự',
            'name.required'=>'Vui lòng nhập họ và tên.',
            'name.max'=>'Họ và tên không vượt quá 30 ký tự'
        ];
    }
}
