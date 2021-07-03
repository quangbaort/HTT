<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'username' => "required|min:6|max:20|unique:users",
        ];
    }
    public function message()
    {
        return [
            'username.required' => 'Tên tài khoản không được bỏ trống',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'username.min' => 'Tên tài khoản phải lớn hơn 6 kí tự',
            'username.max' => 'Tên tài quá dài, lưu ý: nhỏ hơn 20 kí tự',
            'avatar.mimes' => 'Xin lỗi bạn đã tải avatar lên không phải là ảnh',
            'avatar.max' => 'Xin lỗi ảnh avatar của bạn quá lớn'
        ];
    }
    protected $stopOnFirstFailure = true;
    public function withValidator($validator)
    {
        if($validator->fails()){
            toast('Thêm thành viên không thành công','error','top-right');
        }
    }
}
