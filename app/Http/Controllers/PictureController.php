<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Picture;
use App\Http\Repositorys\PictureDepot;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , PictureDepot $picture)
    {
        $admin_id=auth('admin')->user()->id;//获取当前用户id
        $photo_id=$request->photo_id;//所在项目id
        $file=$request->inputimg;
        foreach ($file as $key => $value) {
            $name=$value->hashName();//带扩展名的随机数
            // 存储图片缩略图
            $picture->imgResize($value,$photo_id,$name);
            // 存储图片原图
            $picture->imgCreate($value,$photo_id,$name);
            // 存储数据库.
            Picture::create([
                'admin_id' => $admin_id,
                'image' => $name,
                'photo_id' => $photo_id,
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request){
        $data=$request->toArray();
        $result=Picture::find($data);
        foreach ($result as $value) {
            //获取文件路径
            $path_thumbnail=storage_path('app/public/uploads/images/picture/thumbnail/'.$value->photo_id).'/'.$value->image;
            $path_original=storage_path('app/public/uploads/images/picture/original/'.$value->photo_id).'/'.$value->image;
            // 删除存储文件
            @unlink($path_thumbnail);
            @unlink($path_original);
            // 删除数据库数据
            Picture::destroy($value->id);
        }

        return back();
    }
}
