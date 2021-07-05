<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => "required|min:6|max:50",
            'name_hago' => 'unique:users|required',
            'id_hago' => 'required',
            'vip' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Họ và tên không được bỏ trống',
            'name.min' => 'Họ và tên phải trên 6 kí tự',
            'name.max' => 'Họ và tên quá dài',
            'name_hago.required' => 'Tên Hago không được bỏ trống',
            'name_hago.unique' => 'Tên hago đã tồn tại',
            'id_hago.required' => 'ID hago không được bỏ trống',
            'vip.required' => 'Cấp vip không được bỏ trống', 
            // 'username.required' => 'Tên tài khoản không được bỏ trống',
            // 'password.required' => 'Mật khẩu không được bỏ trống',
            // 'username.unique' => 'Tên tài khoản đã tồn tại',
            // 'username.min' => 'Tên tài khoản phải lớn hơn 6 kí tự',
            // 'username.max' => 'Tên tài quá dài, lưu ý: nhỏ hơn 20 kí tự',
            // 'password.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
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
