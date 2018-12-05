@extends('layouts.app')
@section('title','角色管理')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h5 class="card-title m-3"><i class="fa fa-address-card fa-2x m-1"></i>Roles</h5>
            <a class="btn btn-success m-3 pr-4 pl-4" role="button" href="{{route('role.create')}}"> <i class="fa fa-plus mr-1"></i>添加</a>
        </div>
        <table class="table table-hover">
            <thead class="bg-secondary">
                <tr>
                    <th width='25%'>角色名称</th>
                    <th width='25%'>角色标识</th>
                    <th width='25%'>角色描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @if(($roles)->count())
                @foreach ($roles as $item)
                <tr>
                    <td>{{$item->cn_name}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->describe}}</td>
                    <td  nowrap="nowrap">
                        <a class="btn btn-success btn-sm mr-2" role="button" href="{{route('role.show',$item->id)}}"> <i class="fa fa-eye mr-1"></i>浏览</a>
                        <a class="btn btn-primary btn-sm mr-2" href="{{route('role.edit',$item->id)}}" role="button"><i class="fa fa-edit mr-1"></i>编辑</a>
                        <form class="d-inline" action="{{ route('role.destroy',$item->id) }}" method="post">
                            <button class="btn btn-danger btn-sm mr-2" type="submit" ><i class="fa fa-trash mr-1"></i>删除</a>
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
