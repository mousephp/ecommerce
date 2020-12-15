<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSlideRequest extends FormRequest
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
            'name'        => 'required|unique:slides,slide_title|min:6|max:200',
            'description' => 'required|min:10',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Bạn chưa nhập Tên Slide',
            'name.min'             => 'Tên Slide gồm ít nhất 6 ký tự',
            'name.max'             => 'Tên Slide không được vượt quá 200 ký tự',
            'name.unique'          => 'Tên Slide không được trùng',
            'description.required' => 'Bạn chưa nhập Nội Dung cho Slide',
            'description.min'      => 'Nội Dung Slide gồm tối thiểu 10 ký tự',
        ];
    }
}
