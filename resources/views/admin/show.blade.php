@extends('layouts.app')
@section('title', $user->name.'的个人中心')
@section('content')
<div class="container">
<div class="row">
    <div class="col-sm-12 col-md-3 d-none d-sm-block p-3 card">
            @if ($user->avatar)
                <img class="card-img-top img-thumbnail rounded" src="{{asset('storage/uploads/images/avatar/'.$user->avatar)}}" width="200" alt="865832@qq.com">
            @else
                <img class="thumbnail img-responsive" src="{{asset('photostyle/img/avatars/6.jpg')}}" width="200" alt="865832@qq.com"/>
            @endif
            
        <div class="card-body">

            <hr>
            <h4><strong>个人简介</strong></h4>
            <p>{{$user->intro}} </p>
            <hr>
            <h4><strong>注册于</strong></h4>
            <p>{{$user->created_at->diffForHumans()}}</p>
 
        </div>
    </div>
    <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-body">
                    <h1>{{ $user->nickname?$user->nickname:$user->name }} <small>{{ $user->email }}</small></h1>
            </div>
        </div>
        <div class="m-4"></div>

        {{-- 用户发布的内容 --}}
        <div class="card">
            <div class="card-body">
                暂无数据 ~_~
            </div>
        </div>

    </div>
</div>
</div>
@endsection