@extends('layouts.app')
@section('title','添加用户')
@section('content')
<div class="container">
        <div class="card">
            <h4 class="card-header"> 添加用户</h4>

            <div class="card-body">
                @include('common.error')
                <form action="{{ route('admin.store') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name-field">用户名</label>
                        <input class="form-control" type="text" name="name" id="name-field" placeholder="" value="{{ old('name') }}" />
                    </div>
                    <div class="form-group">
                        <label for="email-field">邮 箱</label>
                        <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email') }}" />
                    </div>

                    <div class="form-group">
                        <label for="password1">密码</label>
                        <input class="form-control" id="password1" name="password" placeholder='' type="password">
                    </div>

                    <div class="form-group">
                        <label for="password2">确认密码</label>
                        <input class="form-control" id="password2" name="password_confirmation" placeholder='' type="password">
                    </div>

                    <div class="form-group">
                        <label for="intro-field">个人简介</label>
                        <textarea name="intro" id="intro-field" class="form-control" rows="3">{{ old('intro') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="" class="avatar-label">用户头像</label>
                        <input type="file" name="avatar">
                            <br>
                            <img class="thumbnail img-responsive" src="{{asset('photostyle/img/avatars/6.jpg')}}" width="200" alt="865832@qq.com"/>
                    </div>

                    <div class="text-right pt-3">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
