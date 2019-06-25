@extends('layout.admin')
@section('title','微商城后台-用户管理')
@section('content')





    <center>
        <form action="{{url('admin/doupdateuser')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$uu->id}}">
            用户名: <input type="text" name="name" value="{{$uu->name}}">
            状态: <input type="text" name="status" value="{{$uu->status}}">
            <input type="submit" value="提交">
        </form>
    </center>



@endsection