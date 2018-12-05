@extends('layouts.app')
@section('title','角色浏览')
@section('content')
    <div class="card">
        <div class="card-body">
                {{ $role->cn_name }}
        </div>
    </div>
@endsection
