<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
            'name'=>'required|unique:categories,cate_name|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Bạn chưa nhập tên Thể Loại!',
            'name.unique'   =>'Tên Thể Loại đã tồn tại, vui lòng nhập lại!',
            'name.min'      =>'Tên Thể Loại gồm ít nhất 3 ký tự!',
            'name.max'      =>'Tên Thể Loại gồm tối đa 50 ký tự!'    
        ];
     }
}
                


