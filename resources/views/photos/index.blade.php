@extends('layouts.app')
@section('title','图片管理')
@section('content')
    {{--  创建项目模态框  --}}
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
        {{--  点击删除弹出模态框  --}}
        @component('common._modal',[
            'modal_id'=>'deleteModal',
            'title'=>'此操作会删除相册下所有照片，是否继续？'
        ])
            <div class="d-flex justify-content-center p-2">
                <form class="d-inline" action="{{route('photo.destroy','delete')}}" method="post">
                    <button type="submit" class="btn btn-danger m-2" >删除</button>
                    @csrf
                    @method('DELETE')
                    <input type="text" class="photoid" name="photo_id" hidden />
                </form>
                <button class="btn btn-primary m-2" type="button" data-dismiss="modal">取消</button>
            </div>
        @endcomponent
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
                    <button data-toggle="modal" data-target="#deleteModal"  style="border:none" onclick="photo_del({{ $item->id }})"><i class="fa fa-times-circle fa-lg p-2" aria-hidden="true"></i></button>
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
        <div class="col-12 col-md-2 col-sm-3">
            <div class="bg-light text-center">
                <a href="javascript:void" role="button" data-toggle="modal" data-target="#photoModal"><i class="fa fa-plus fa-lg p-5 bg-light" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
@endsection
@section('customJs')
    <script>
        {{--  删除相册逻辑  --}}
        function photo_del(photo_id){
            $('#deleteModal .photoid').val(photo_id);
        }
    </script>
@endsection
