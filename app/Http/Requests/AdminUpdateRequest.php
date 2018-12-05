<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdateRequest extends FormRequest
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
        $id=$this->route('admin');//获取当前需要排除的id,这里的 admin 是 路由的后缀admin/{admin} 大括号里面的admin 。
        // dd{$id};
        return [
            'name'=>'bail|required|between:2,30|regex:/^[A-Za-z0-9\-\_]+$/|unique:users|unique:admins,nickname|unique:admins,name,'.$id,
            'nickname'=>'bail|string|nullable|between:2,30|unique:users|unique:admins,name|unique:admins,nickname,'.$id,
            'email'=>'bail|required|email|unique:users|unique:admins,email,'.$id,
            'intro' => 'bail|nullable|string|max:80',
            'avatar'=>'bail|image|dimensions:min_width=200,min_height=200',
            'password'=>'bail|nullable|string|between:6,30|confirmed|string',
            'password_original'=>'bail|sometimes|check_password',
        ];
    }
    // 对字段的解释
    public function attributes(){
        return [
            'name'=>'用户名',
            'nickname'=>'昵称',
            'password'=>'密码',
            'avatar'=>'头像',
            'intro'=>'简介',
            'password_confirmation'=>'确认密码',
            'email'=>'邮箱',
            'password_original'=>'原密码'
        ];
    }


}
