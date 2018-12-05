<?php
namespace App\Http\Repositorys;

use App\Models\Photo;


class PhotoDepot
{
    public function list(){
        $photos=Photo::get();
        return $photos;
    }
    public function create($request){
        $data=$request->all();
        $file=$request->cover;
        // 添加数据并返回此行id
        $id=$request->user('admin')->photo()->create($data)->id;
        if($request->hasFile('cover')){
            $cover_name=UploadImage::photo_cover($file,$id);
            Photo::find($id)->update(['cover'=>$cover_name]);
        }

    }
}
