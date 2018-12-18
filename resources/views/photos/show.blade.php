@extends('layouts.app')
@section('title','项目浏览')
@section('content')

    <div class="title p-3 d-flex align-items-center bg-light mb-4">
        <i class="fa fa-camera fa-2x mr-2" aria-hidden="true"></i>
        <span class="mr-4 font-weight-bold">Picture</span>
        <button type="button" class="btn btn-success pl-4 pr-4 mr-3" data-toggle="modal" data-target="#picModal"><i class="fa fa-plus mr-1"></i>添加</button>
        <button type="button" class="edit btn btn-primary pl-4 pr-4 mr-3" onclick="onEdit()"><i class="fa fa-edit mr-1"></i>编辑</button>
        <div class="btn-group edit-group" role="group">
                <button type="button" class="btn btn-secondary">全选</button>
                <button type="button" class="btn btn-secondary">取消</button>
                <button type="submit" class="btn btn-secondary" onclick="document.getElementById('box-form').submit()">删除</button>
        </div>
    </div>
    <div class="roof">
        <img src="" alt="865832@qq.com">
    </div>
    <div class="row card-group card-picture masonry ml-3 mr-3">
        <form id="box-form" method="post" action="{{ route('picture.delete') }}">
            @csrf

            @foreach ($picture as $item)
                <div class="col-6 col-sm-3 col-md-2 item">
                    <div class="card picture-card">
                        <input class="position-absolute ml-3 mt-3" type="checkbox" name="picture{{ $item->id }}" value="{{ $item->id }}" id="check{{ $item->id }}">
                        <label class="m-0" for="check{{  $item->id }}">
                            <img class="img-item picture-img edit-img" src="{{ asset('storage/uploads/images/picture/thumbnail/'.$id.'/'.$item->image) }}" onclick="showImg('{{ asset('storage/uploads/images/picture/original/'.$id.'/'.$item->image)}}')" alt="865832@qq.com" />
                        </label>
                    </div>
                </div>
            @endforeach
        </form>
    </div>
    <style>
        {{--  编辑按钮  --}}
        .card-picture input, .edit-group{
            display: none;
        }
        .edit-card:hover .picture-img{
            box-shadow: .1rem .1rem 1rem #000;
        }
        {{--  end  --}}

        .picture-img{
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }
        .edit-img:hover{
            cursor: pointer;
            box-shadow: .1rem .1rem 1rem #000;
        }
        {{--  遮蔽层  --}}
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
        {{--  end  --}}

        {{--  加载效果  --}}
        .page-load-status {
            display: none; /* hidden by default */
            padding-top: 20px;
            border-top: 1px solid #DDD;
            text-align: center;
            color: #777;
          }

        .loader-ellips {
            font-size: 20px;
            position: relative;
            width: 4em;
            height: 1em;
            margin: 10px auto;
        }
          .loader-ellips__dot {
            display: block;
            width: 1em;
            height: 1em;
            border-radius: 0.5em;
            background: #555;
            position: absolute;
            animation-duration: 0.5s;
            animation-timing-function: ease;
            animation-iteration-count: infinite;
          }

          .loader-ellips__dot:nth-child(1),
          .loader-ellips__dot:nth-child(2) {
            left: 0;
          }
          .loader-ellips__dot:nth-child(3) { left: 1.5em; }
          .loader-ellips__dot:nth-child(4) { left: 3em; }

          @keyframes reveal {
            from { transform: scale(0.001); }
            to { transform: scale(1); }
          }

          @keyframes slide {
            to { transform: translateX(1.5em) }
          }

          .loader-ellips__dot:nth-child(1) {
            animation-name: reveal;
          }

          .loader-ellips__dot:nth-child(2),
          .loader-ellips__dot:nth-child(3) {
            animation-name: slide;
          }

          .loader-ellips__dot:nth-child(4) {
            animation-name: reveal;
            animation-direction: reverse;
          }

          {{--  end  --}}

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
        <div class="page-load-status text-center">
            <div class="loader-ellips infinite-scroll-request">
              <span class="loader-ellips__dot"></span>
              <span class="loader-ellips__dot"></span>
              <span class="loader-ellips__dot"></span>
              <span class="loader-ellips__dot"></span>
            </div>
            <p class="scroller-status__message infinite-scroll-last">End of content</p>
            <p class="scroller-status__message infinite-scroll-error">No more pages to load</p>
          </div>
          <div class="p-5"></div>
    @include('common._fileinput')
        <div class="fa">
            <p class="pagination d-none">
                <a class="pagination__next" href="http://www.photo.test/photo/{{ $id }}?page=2">Next page</a>
            </p>
        </div>
@endsection



