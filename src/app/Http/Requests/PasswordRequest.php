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
            'password_old' => 'required|min:6',
            'password_new' => 'required|min:6',
            'password_confirm' => 'required|min:6|same:password_new',

        ];
    }
    public function messages()
    {
        return [
            'password_old.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
            'password_old.required' => 'Mật khẩu không được bỏ trống',
            'password_new.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
            'password_new.required' => 'Mật khẩu không được bỏ trống',
            'password_comfirm.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
            'password_confirm.required' => 'Mật khẩu không được bỏ trống',
            'password_confirm.same' => 'Mật khẩu không trùng khớp',
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
