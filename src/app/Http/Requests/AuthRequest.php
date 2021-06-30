<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'username' => "required|min:6|max:20",
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Tên tài khoản không được bỏ trống',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'username.min' => 'Tên tài khoản phải lớn hơn 6 kí tự',
            'username.max' => 'Tên tài quá dài, lưu ý: nhỏ hơn 20 kí tự',
            'password.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
        ];
    }
}
