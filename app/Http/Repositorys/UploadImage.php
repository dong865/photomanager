<?php
namespace App\Http\Repositorys;
use Image;

class UploadImage
{
    // 头像
    public static function storage($file,$id){
        $entension = $file -> getClientOriginalExtension();
        $file_name='avatar_'.$id.'.'.$entension;
        $file->storeAs('public/uploads/images/avatar',$file_name);
        //返回图片名字
        return $file_name;
    }

    // photo封面
    public static function photo_cover($file,$id){
        $entension = $file ->getClientOriginalExtension();
        $file_name='cover_'.$id.'.'.$entension;
        // 返回storage目录的绝对路径
        $path=storage_path('app/public/uploads/images/photo/cover/'.$file_name);
        // 调用intervention-Image插件的Image类进行图片的处理
        Image::make($file)//初始化图片文件
            ->fit(300,260)//剪切并调整大小
            ->save($path);//将图片保存到$path路径

        return $file_name;
    }
}
