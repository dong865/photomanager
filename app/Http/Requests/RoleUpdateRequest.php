<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
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
        // 获取要排除的id
        $id=$this->route('role');//获取路由的后缀。
        // dd($id);
        return [
            'cn_name'=>'bail|required|string|between:2,10|unique:roles,cn_name,'.$id,
            'name'=>'bail|required|string|regex:/^[a-zA-Z]+$/|between:2,20|unique:roles,name,'.$id,
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
    // 错误消息提示messages
    public function messages(){
        return[
            'name.regex'=>'角色标识必须由字母组成'
        ];
    }
}
