@extends('layouts.app')
@section('title','项目浏览')
@section('content')
    <div class="row card-group card-picture masonry">
        @foreach ($picture as $item)
            <div class="col-12 col-md-2 col-sm-3 item">
                <div class="card">
                    <img src="{{ asset('storage/uploads/images/picture/'.$id.'/'.$item->image) }}" alt="865832@qq.com" />
                </div>
            </div>
        @endforeach
    </div>
    <style>
        .card-picture img{
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
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



