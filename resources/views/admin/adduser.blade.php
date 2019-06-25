@extends('layout.admin')
@section('title','微商城后台-用户管理')
@section('content')





<center>
    <form action="{{url('admin/dodduser')}}" method="post">
        @csrf
        用户名: <input type="text" name="name" >

        密  码:<input type="password" name="pwd">
        <input type="submit" value="提交">
    </form>
</center>



@endsection