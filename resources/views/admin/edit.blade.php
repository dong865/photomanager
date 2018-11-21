@extends('layouts.app')
@section('title','编辑个人资料')
@section('content')  

    <div class="container">
        <div class="card">
            <h4 class="card-header"> 编辑个人资料</h4>
    
            <div class="card-body">
                @include('common.error')
                @include('common.message')
                <form action="{{ route('admin.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
    
                    <div class="form-group">
                        <label for="name-field">用户名</label>
                        <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $user->name) }}" />
                    </div>
                    <div class="form-group">
                            <label for="nickname-field">昵称</label>
                            <input class="form-control" type="text" name="nickname" id="nickname-field" value="{{ old('nickname', $user->nickname) }}" />
                        </div>
                    <div class="form-group">
                        <label for="email-field">邮 箱</label>
                        <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email) }}" />
                    </div>

                    <div class="form-group">
                        <label for="email-field">密码</label>
                        <input class="form-control" id="password3" name="password" placeholder='' type="password">
                    </div>
                    <div class="form-group">
                        <label for="email-field">确认密码</label>
                        <input class="form-control" id="password3" name="password_confirmation" placeholder='' type="password">
                    </div>

                    <div class="form-group">
                        <label for="intro-field">个人简介</label>
                        <textarea name="intro" id="intro-field" class="form-control" rows="3">{{ old('intro', $user->intro) }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="" class="avatar-label">用户头像</label>
                        <input type="file" name="avatar">
    
                        @if($user->avatar)
                            <br>
                            <img class="thumbnail img-responsive" src="{{asset('storage/uploads/images/avatar/'.$user->avatar)}}" width="200" alt="865832@qq.com"/>
                        @else
                            <br>
                            <img class="thumbnail img-responsive" src="{{asset('photostyle/img/avatars/6.jpg')}}" width="200" alt="865832@qq.com"/>
                        @endif
                    </div>

                    <div class="text-right pt-3">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection