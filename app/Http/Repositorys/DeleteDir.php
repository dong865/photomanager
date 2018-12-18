<?php
namespace App\Http\Repositorys;

class DeleteDir
{
    public static function dirdel($path){
        if(is_dir($path)){//判断$path是否为文件夹
            $data=scandir($path);//遍历文件夹返回数组，如果是空目录返回null。
            if($data){
                foreach($data as $value){//遍历数组
                    // 排除.和..
                    if($value!='.'&&$value!='..'){
                        // 如果是文件夹调用函数自身，递归子目录继续操作。
                        if(is_dir($path.'/'.$value)){
                            dirdel($path.'/'.$value);
                        }else{
                            @unlink($path.'/'.$value);//如果是文件直接删除，
                        }
                    }
                }
                @rmdir($path);//目录清空后删除空文件夹
            }else{
                @rmdir($path);//空目录直接删除。
            }
        }else{
            @unlink($path);//如果是文件直接删除。
        }
    }
}
