<?php
namespace App\Http\Repositorys;

use App\Models\Admin;

class AdminDepot
{
    public function update($request,$id){
        //接收集合转换成数组。 
        $data=$request->all();
        $file=$request->avatar;
        if($file){
            // 存在上传文件时调用storage()方法
            $data['avatar']=UploadImage::storage($file,$id);
        }
        if($request->password){
            $data['password']=bcrypt($request->password);
            Admin::find($id)->update($data);
        }else{
            unset($data['password']);
            Admin::find($id)->update($data);
        }
    }

    public function add($request){
         //接收集合转换成数组。 
         $data=$request->all();
         $data['password']=bcrypt($request->password);
         $file=$request->avatar;
        //  返回添加数据的id
         $id=Admin::create($data)->id;

         if($file){
             // 存在上传文件时调用storage()方法
             $data['avatar']=UploadImage::storage($file,$id);
             Admin::find($id)->update($data);
         }
    }
}
