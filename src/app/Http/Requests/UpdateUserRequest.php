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
            'username' => "required|min:6|max:20|unique:users",
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Tên tài khoản không được bỏ trống',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'username.min' => 'Tên tài khoản phải lớn hơn 6 kí tự',
            'username.max' => 'Tên tài quá dài, lưu ý: nhỏ hơn 20 kí tự',
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
