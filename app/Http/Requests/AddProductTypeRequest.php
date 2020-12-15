<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductTypeRequest extends FormRequest
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
            'name'=>'required|unique:product_type,prod_type_name|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Bạn chưa nhập tên Thương hiệu!',
            'name.unique'   => 'Tên Thương hiệu đã tồn tại, vui lòng nhập lại!',
            'name.min'      =>'Tên Thương hiệu gồm ít nhất 2 ký tự!',
            'name.max'      =>'Tên Thương hiệu gồm tối đa 50 ký tự!'    
        ];
     }
}
