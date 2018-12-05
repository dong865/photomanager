@extends('layouts.app')
@section('title','用户管理')
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="card-title m-3"><i class="fa fa-user fa-2x m-1"></i>Users</h5>
                <a class="btn btn-success m-3 pr-4 pl-4" role="button" href="{{route('admin.create')}}"> <i class="fa fa-plus mr-1"></i>添加</a>
            </div>
            <table class="table table-hover">
                <thead class="bg-secondary">
                    <tr>
                        <th><i class="fa fa-user-o fa-lg" aria-hidden="true"></i></th>
                        <th>用户名</th>
                        <th>昵称</th>
                        <th>邮箱</th>

                        <th nowrap="nowrap">注册时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @if(($users)->count())
                    @foreach ($users as $item)
                    <tr>
                        <td>
                            @if ($item->avatar)
                                <img src="{{asset('storage/uploads/images/avatar/'.$item->avatar)}}" alt="865832@qq.com"  width="80">
                            @else
                                <img class="thumbnail img-responsive" src="{{asset('photostyle/img/avatars/6.jpg')}}" width="80" alt="865832@qq.com"/>
                            @endif

                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->nickname}}</td>
                        <td>{{$item->email}}</td>

                        <td>{{$item->created_at}}</td>
                        <td  nowrap="nowrap">
                            <a class="btn btn-success btn-sm mr-2" role="button" href="{{route('admin.show',$item->id)}}"> <i class="fa fa-eye mr-1"></i>浏览</a>
                            <a class="btn btn-primary btn-sm mr-2" href="{{route('admin.edit',$item->id)}}" role="button"><i class="fa fa-edit mr-1"></i>编辑</a>
                            <form class="d-inline" action="{{ route('admin.destroy',$item->id) }}" method="post">
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
