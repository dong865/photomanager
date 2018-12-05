<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleAddRequest extends FormRequest
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
            'cn_name'=>'bail|required|string|between:2,10|unique:roles',
            'name'=>'bail|required|string|regex:/^[a-zA-Z]+$/|between:2,20|unique:roles',
            'describe'=>'bail|nullable|string|between:2,80'
        ];
    }
    // 中文解释
    public function attributes(){
        return[
            'cn_name'=>'角色名称',
            'name'=>'角色标识',
            'describe'=>'角色描述',
        ];
    }
    // 错误信息提示
    public function messages(){
        return[
            'name.regex'=>'角色标识必须由字母组成'
        ];
    }
}
