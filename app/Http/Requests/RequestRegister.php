<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
          
            'name'=>'required|max:40|unique:users',
            'email'=>'required|email|max:30|unique:users',
            'phone'=>'required|integer',
            'address'=>'required|max:150',
            'username'=>'required|max:20|unique:accounts',
            'password'=>'required|max:10',
            'password_resets'=>'required|same:password|max:10'

        ];
    }
      public function messages()
    {
        return[
            'email.required'=>'Vui lòng nhập email ',
            'email.max'=>'không vượt quá 30 ký tự',
            'email.unique'=>'email này đã tồn tại',
            'email.email'=>'Không đúng định dạng email',
            'address.required'=>'Địa chỉ không được bỏ trống',
            'address.max'=>'Địa chỉ không vượt quá 150 ký tự',
            'phone.required'=>'Số điện thoại không được bỏ trống',
            'phone.integer'=>'Số điện thoại chỉ nhập số',
            'username.required'=>'Vui lòng nhập tài khoản',
            'username.max'=>'Tên đăng nhập không vượt quá 20 ký tự',
            'username.unique'=>'Tên đăng nhập đã tồn tại',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.max'=>'Mật khẩu không vượt quá 10 ký tự',
            'password_resets.same'=>'Mật khẩu xác nhận không đúng',
            'password_resets.max'=>'Mật khẩu xác thực không vượt quá 10 ký tự',
            // 'email_customer.unique'=>'Email đã có người sử dụng',
            'name.required'=>'Vui lòng nhập họ và tên.',
            'name.max'=>'Không vượt quá 40 ký tự',
            'name.unique'=>'Họ tên người dùng đã tồn tại'

          
        ];
    }
}
