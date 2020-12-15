<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTagsRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|unique:tags,tag_name,'.$this->tag.',id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên tags!',
            'name.unique'   => 'Tên tags đã tồn tại, vui lòng nhập lại!',
            'name.min'      => 'Tên tags gồm ít nhất 3 ký tự!',
            'name.max'      => 'Tên tags gồm tối đa 50 ký tự!'    
        ];
     }
}
