<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
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
            'name'    =>  'required|min:3|max:100',
            'email'   =>  'required|email',
            'message' =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'required'    => ':attribute không được bỏ trống',
            'min'         => ':attribute gồm ít nhất 3 ký tự!',
            'max'         => ':attribute gồm tối đa 50 ký tự!',
            'email'       => ':attribute không đúng định dạng mail'
        ];
    }

    public function attributes(){
        return [
            'name'    => 'Tên',
            'email'   => 'Email',
            'message' => 'Nội dung'
        ];
    }
    
}
