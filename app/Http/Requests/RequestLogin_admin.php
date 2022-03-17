<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin_admin extends FormRequest
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
             'username' => 'required:max:20',
             'password'=>'required|max:10'
        ];
    }
     public function messages()
    {
        return[
            'username.required' => 'Tên đăng nhập không được bỏ trống',
            'username.max' => 'Không vượt quá 20 ký tự',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'password.max' => 'Mật khẩu không vượt quá 10 ký tự'
        ];
    }
}
