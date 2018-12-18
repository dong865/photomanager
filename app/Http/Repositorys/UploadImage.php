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

    /*
        缩略图存储
        宽度固定，高度等比例缩放
        $imgFile:图片文件
        $phth:要存储的路径/文件名
    */
    public static function picThumb($imgFile,$path,$width=260){
        $img=Image::make($imgFile)//初始化Image插件
            // 宽度300px，高等比例缩放
            ->resize($width,null,function($constraint){
                $constraint->aspectRatio();
            })
            ->save($path);//保存
    }
}
