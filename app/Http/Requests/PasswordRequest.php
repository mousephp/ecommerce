<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'user_password'         =>'required|min:5',
            'user_password_new'     =>'required',
            'password_confirmation' =>'required|same:user_password_new',
        ];
    }

    public function messages()
    {
        return [
            'user_password.required'         =>'Trường này không được để trống',
            'user_password_new.required'     =>'Trường này không được để trống',
            'password_confirmation.required' =>'Trường này không được để trống',
            'password_confirmation.same'     =>'Mật khẩu xác nhận không đúng',
        ];
    }
}
