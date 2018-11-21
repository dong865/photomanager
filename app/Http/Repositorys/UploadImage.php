<?php
namespace App\Http\Repositorys;

class UploadImage
{
    public static function storage($file,$id){
        $entension = $file -> getClientOriginalExtension();
        $file_name='avatar_'.$id.'.'.$entension;
        $file->storeAs('public/uploads/images/avatar',$file_name);
        //返回图片名字
        return $file_name;
    }

    public static function photo_cover($file,$id){
        $entension = $file ->getClientOriginalExtension();
        $file_name='cover_'.$id.'.'.$entension;
        $file->storeAs('public/uploads/images/photo/cover',$file_name);
        return $file_name;
    }
}