<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Requestupdatepassword extends FormRequest
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
            
            'password_old'=>'required|max:10',
            'password_new'=>'required|max:10',
            're_password_new'=>'required|same:password_new|max:10'
        ];
    }
      public function messages()
    {
        return[
             'password_old.required'=>'Vui lòng nhập mật khẩu cũ',
             'password_old.max'=>'Mật khẩu cũ không vượt quá 10 ký tự',
            'password_new.required'=>' Vui lòng nhập mật khẩu mới',
            'password_new.max'=>'Mật khẩu mới không vượt quá 10 ký tự',
            're_password_new.required'=>'Vui lòng xác nhận mật khẩu mới',
            're_password_new.same'=>'Mật khẩu xác nhận không đúng',
            're_password_new.max'=>'Mật khẩu xác nhận không vượt quá 10 ký tự'
        ];
    }
}
