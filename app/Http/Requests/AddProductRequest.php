<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'name'        =>'required|min:3|max:255|unique:products,prod_title',
            'description' =>'required|min:5',
            'quantity'    =>'required|numeric',
            'price'       =>'required|numeric',
            'accessories' =>'required|min:4',
            'promotion'   =>'required|min:4',
            'condition'   =>'required|min:2',
            'image'       =>'required|image',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'min'      => ':attribute tối thiểu có 2 ký tự',
            'max'      => ':attribute tối đa có 255 ký tự',
            'numeric'  => ':attribute phải là một số ',
            'image'    => ':attribute không là hình ảnh',
            'unique'   => ':attribute đã tồn tại trong hệ thống'
        ];
    }

    public function attributes(){
        return [
            'name'        =>'Tên sản phẩm',
            'description' =>'Mô tả sản phẩm',
            'quantity'    =>'Số lượng sản phẩm',
            'price'       =>'Đơn giá sản phẩm',
            'image'       =>'Ảnh minh họa',
            'accessories' =>'Phụ kiện',
            'promotion'   =>'Khuyến mãi',
            'condition'   =>'Tình trạng',
            'amount'      =>'Số lượng',
        ];
    }
}
