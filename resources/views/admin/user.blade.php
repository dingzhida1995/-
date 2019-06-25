@extends('layout.admin')
@section('title','微商城后台-用户管理')
@section('content')
   <center>
    <form action="{{url('admin/adduser')}}">
        <input type="text" name="soso" value="{{$soso}}">
        <input type="submit" value="soso">
    </form>
   </center>
    <table border="2" align="center">
        <tr align="center">
            <td width="50">ID</td>
            <td width="100">用户名</td>
            <td width="50">状态</td>
            <td width="200">添加时间</td>
            <td width="200">修改时间</td>
            <td width="100">状态</td>
        </tr>
        @foreach($user as $usr)
        <tr align="center">
            <td>{{$usr->id}}</td>
            <td>{{$usr->name}}</td>
            <td>{{$usr->status}}</td>
            <td>{{$usr->created_at}}</td>
            <td>{{$usr->updated_at}}</td>
            <td><a href="{{url('admin/deluser')}}?id={{$usr->id}}">删除</a> || <a href="{{url('admin/updateuser')}}?id={{$usr->id}}">修改</a></td>
        </tr>
            @endforeach
    </table>
    <center>{{$user->appends(['soso' => $soso])->links()}}</center>
@endsection