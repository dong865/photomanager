<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAddRequest extends FormRequest
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
            //
            'name'=>'bail|required|between:2,30|regex:/^[A-Za-z0-9\-\_]+$/|unique:users|unique:admins',
            'nickname'=>'bail|string|nullable|between:2,30|unique:users|unique:admins',
            'email'=>'bail|email|required|unique:users,email|unique:admins,email',
            'intro'=>"bail|string|max:80|nullable",
            'avatar'=>'bail|image|dimensions:min_width=200,min_height=200',
            'password'=>'bail|required|between:6,30|confirmed|string'
        ];
    }

    public function attributes(){
        return[
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
