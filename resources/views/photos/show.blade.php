@extends('layouts.app')
@section('title','项目浏览')
@section('content')
    <div class="roof">
        <img src="" alt="865832@qq.com">
    </div>
    <div class="row card-group card-picture masonry ml-3 mr-3">
        @foreach ($picture as $item)
            <div class="col-6 col-md-2 col-sm-3 item">
                <div class="card">
                    <img class="img-item img-thumbnail " src="{{ asset('storage/uploads/images/picture/'.$id.'/'.$item->image) }}" onclick="showImg('{{ asset('storage/uploads/images/picture/'.$id.'/'.$item->image)}}')" alt="865832@qq.com" />
                </div>
            </div>
        @endforeach
        {{  $picture->links()  }}
    </div>
    <style>
        .card-picture{
            background: #666;
        }
        .card-picture img{
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
        .card-picture img:hover{
            cursor: pointer;
            box-shadow: .1rem .1rem 1rem #000;
        }
        .roof{
            display: none;
            position: fixed;
            top: 0;left: 0;right: 0;bottom: 0;
            background: #000;
            z-index: 1;
        }
        .roof img{
            display: none;
            position:absolute;
            top: 50%;left: 50%;
            transform: translate(-50%,-50%);
            background: #000;
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
    {{--  添加图片模态框  --}}
    @component('common._modal',[
            'modal_id'=>'picModal',
            'title'=>'新建文件夹',
            ])
            <form action="{{route('picture.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="d-none" type="text" value="{{ $id }}" name="photo_id">
                <div class="modal-body">
                    <div class="file-loading">
                        <input id="inputimg" name="inputimg[]" multiple type="file">
                    </div>
                    <div id="kartik-file-errors"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">确定</button>
                </div>
            </form>
        @endcomponent
    @include('common._fileinput')
        <div class="col-12 col-md-2">
            <div class="card bg-light">
                <a href="javascript:void" role="button" data-toggle="modal" data-target="#picModal"><i class="fa fa-plus fa-lg p-5 bg-light" aria-hidden="true"></i></a>
            </div>
        </div>
@endsection



