@extends('layouts.app')
@section('title','图片管理')
@section('content')    
    @component('common._modal',[
        'modal_id'=>'photoModal',
        'title'=>'新建文件夹',
        ])
        <form action="{{route('photo.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">                  
                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="请填写文件夹标题">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="describe" id="describe" placeholder="请描述内容">
                </div>
                <div class="form-group">
                    <input type="file" name="cover">
                </div>                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary">确定</button>
            </div>
        </form>
    @endcomponent
    {{-- 项目视图 --}}
    <div class="card-group row m-2">
        @foreach ($photos as $item) 
        <div class="col-12 col-md-2 col-sm-3"> 
                <style type="text/css">
                    .photo-card a{
                        text-decoration:none;
                        color: #444;
                    }
                    .photo-bar{
                        opacity:0.7;width:100%;background:#fff;position:absolute;
                        height: 0;
                        overflow: hidden;
                        transition: height .3s;
                        -webkit-transition:height .3s; /* Safari */
                        text-align: right;
                    }
                    .photo-card:hover .photo-bar{
                        height: 32px;
                    }
                </style>
            <div class="card photo-card">    
                <div class="photo-bar">   
                    <a href="{{route('photo.edit',$item->id)}}"><i class="fa fa-cog fa-lg p-2" aria-hidden="true"></i></a>
                    <form class="d-inline" action="{{route('photo.destroy',$item->id)}}" method="post">                                    
                        <button type="submit" style="border:none"><i class="fa fa-times-circle fa-lg p-2" aria-hidden="true"></i></button>       
                        @csrf
                        @method('DELETE')
                    </form>
                </div>                     
                <a href="{{route('photo.show',$item->id)}}"><img class="card-img-top" src="{{asset('storage/uploads/images/photo/cover/'.$item->cover)}}" alt="865832@qq.com"></a>
                <a href="{{route('photo.show',$item->id)}}">
                <div class="card-body">
                    <h5 class="card-title" style="overflow:hidden;white-space: nowrap;text-overflow:ellipsis;">{{$item->name}}</h5>
                    <div style="height:46px;overflow:hidden;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;">
                        <p class="card-text">{{$item->describe}}</p>
                    </div>                           
                    <p class="card-text"><small class="text-muted">创建于：{{$item->created_at->diffForHumans()}}</small></p>
                </div>
                </a>
            </div>
        </div>   

        @endforeach
        <div class="col-12 col-md-2">
            <div class="card bg-light">
                <a href="javascript:void" role="button" data-toggle="modal" data-target="#photoModal"><i class="fa fa-plus fa-lg p-5 bg-light" aria-hidden="true"></i></a>                   
            </div>
        </div>               
    </div>  
@endsection