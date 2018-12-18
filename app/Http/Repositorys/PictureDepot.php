<?php
namespace App\Http\Repositorys;

use Image;

class PictureDepot
{
    // 存储原图
    public function imgCreate($value,$photo_id,$name){
        // $extend=$value->getClientOriginalExtension();//获取扩展名.
        $path=$value->storeAs('public/uploads/images/picture/original/'.$photo_id,$name);
    }
    // 存储图片缩略图
    public function imgResize($imgfile,$photo_id,$name){
        $makeDir='storage/uploads/images/picture/thumbnail/'.$photo_id;
        if(!file_exists($makeDir)){//判断文件或目录是否存在
           mkdir($makeDir,true);//不存在，创建文件夹
        }
        $path=$makeDir.'/'.$name;//获取存储图片的路径/文件名。
        UploadImage::picThumb($imgfile,$path);
    }
}
