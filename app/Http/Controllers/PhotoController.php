<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhotoAddRequest;
use App\Http\Repositorys\PhotoDepot;
use App\Http\Repositorys\DeleteDir;
use App\Models\Photo;
use App\Models\Picture;

class PhotoController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PhotoDepot $photoCode)
    {
        $photos=$photoCode->list();
        return view('photos.index',compact('photos'));
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
    public function store(PhotoAddRequest $request,PhotoDepot $photoCode)
    {
        $photoCode->create($request);
        $request->session()->flash('success','添加项目成功');
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
        //获取id为$id的相册下所有的图片
        $picture=Photo::find($id)->picture()->paginate(25);
        // dd($picture->toArray()['next_page_url']);
        return view('photos.show',compact('picture','id'));
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
    public function destroy(Request $request, $id)
    {
        $photo_id=$request->photo_id;
        $picture=Photo::find($photo_id)->picture;
        $name=Photo::find($photo_id)->cover;
        // 删除封面图片
        $path_cover=storage_path('app/public/uploads/images/photo/cover').'/'.$name;
        @unlink($path_cover);
        // 删除相册内所有图片
        $path_picture_original=storage_path('app/public/uploads/images/picture/original/'.$photo_id);
        $path_picture_thumbnail=storage_path('app/public/uploads/images/picture/thumbnail/'.$photo_id);
        DeleteDir::dirdel($path_picture_thumbnail);
        DeleteDir::dirdel($path_picture_original);
        // 删除数据库数据
        if($picture->count()){
            foreach ($picture as $key => $value) {
                $picture_id[]=$value->id;//获取相册所有照片id的数组。
            }
            picture::destroy($picture_id);//删除照片数据
        }
        Photo::destroy($photo_id);//删除相册数据

        session()->flash('success','删除成功');
        return back();
    }
}
