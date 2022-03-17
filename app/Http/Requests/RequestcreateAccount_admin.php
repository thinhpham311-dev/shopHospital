<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestcreateAccount_admin extends FormRequest
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
            'address'=>'required|max:150',
            'username'=>'required|max:20',
            'password'=>'required|max:10'
        ];
    }
      public function messages()
    {
        return[
            'email.required'=>'Vui lòng nhập email ',
            'email.email'=>'Không đúng định dạng email',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'phone.integer'=>'Số điện thoại chỉ nhập số',
            // 'phone.max'=>'Số điện thoại không vượt quá 20 ký tự',
            'address.required'=>'Vui lòng nhập đĩa chỉ',
            'address.max'=>'Địa chỉ không vượt quá 150 ký tự',
            'username.required'=>'Vui lòng nhập tài khoản',
            'username.max'=>'Tên đăng nhập không vượt quá 20 ký tự',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.max'=>'Mật khẩu không vượt quá 10 ký tự',
            /*'email_customer.unique'=>'Email đã có người sử dụng',*/
            'name.required'=>'Vui lòng nhập họ và tên.',
            'name.max'=>'Họ và tên không vượt quá 30 ký tự'
        ];
    }
}
