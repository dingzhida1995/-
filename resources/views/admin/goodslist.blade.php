@extends('layout.admin')
@section('title','微商城-商品信息')
@section('content')
 <!--    Context Classes  -->
<div class="panel panel-default">
   
    <div class="panel-heading">
        商品信息列表
    </div>
    
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>商品名称</th>
                        <th>库存</th>
                        <th>价格</th>
                        <th>图片</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $k=>$v)
                    <tr class="danger">
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->num}}</td>
                        <td>{{$v->price}}</td>
                        <td>
                        	<img src="{{asset($v->img)}}" alt="" width='50' height="50">
                        </td>
                        <td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
                        <td>
                        	<a href="{{url('admin/goodsDel')}}?id={{$v->id}}">删除</a>
							&nbsp;||&nbsp;
							<a href="{{url('admin/goodsUpd')}}?id={{$v->id}}">修改</a>
                        </td>
                    </tr>
					@endforeach
                </tbody>
                <tr>
                	<td>
                		{{$data->appends(['sou' => $sou])->links()}}
                	</td>
                	
                </tr>
            </table>
        </div>
    </div>
</div>
<!--  end  Context Classes  -->
@endsection