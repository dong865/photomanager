@extends('layouts.app')
@section('title','角色编辑')
@section('content')
    <div class="container">
        <div class="card">
            <h4 class="card-header"> 编辑个人资料</h4>

            <div class="card-body">
                @include('common.error')
                @include('common.message')
                <form action="{{ route('role.update', $role->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf

                    <div class="form-group">
                        <label for="cn_name-field">角色名称</label>
                        <input class="form-control" type="text" name="cn_name" id="cn_name-field" value="{{ old('cn_name', $role->cn_name) }}" />
                    </div>
                    <div class="form-group">
                            <label for="name-field">角色标识</label>
                            <input class="form-control" type="text" name="name" id="name-field" value="{{ old('name', $role->name) }}" />
                        </div>
                    <div class="form-group">
                        <label for="describe-field">角色描述</label>
                        <input class="form-control" type="text" name="describe" id="describe-field" value="{{ old('describe', $role->describe) }}" />
                    </div>


                    <div class="text-right pt-3">
                        <button type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
