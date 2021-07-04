<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvatarRequest extends FormRequest
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
             'avatar' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ];
    }
    public function messages()
    {
        return [
            'avatar.mimes' => 'Xin lỗi bạn đã tải avatar lên không phải là ảnh',
            'avatar.max' => 'Xin lỗi ảnh avatar của bạn quá lớn'
        ];
    }
    protected $stopOnFirstFailure = true;
    public function withValidator($validator)
    {
        if($validator->fails()){
            toast('Thay đổi không thành công','error','top-right');
        }
    }
}
