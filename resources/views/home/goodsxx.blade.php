@extends('layout.index')
@section('title','商品详情')
@section('content')
<!-- wishlist -->
<div class="wishlist section">
    <div class="container">
        <div class="pages-head">
            <h3>商品详情</h3>
        </div>
        <div class="content">
            <div class="cart-1">
                <div class="row">
                    <div class="col s5">
                        <h5>Image</h5>
                    </div>
                    <div class="col s7">
                        <img src="{{$dada->img}}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>商品名称</h5>
                    </div>
                    <div class="col s7">
                        <h5><a href="">{{$dada->name}}</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>商品介绍</h5>
                    </div>
                    <div class="col s7">
                        <h5>In Stock</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>价格</h5>
                    </div>
                    <div class="col s7">
                        <h5>${{$dada->price}}</h5>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col s5">
                        <h5>Action</h5>
                    </div>
                    <div class="col s7">
                        <h5><i class="fa fa-trash"></i></h5>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col 12">
                        <a href="{{url('home/cart?id=')}}{{$dada->id}}" class="btn button-default">加入购物车</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end wishlist -->



@endsection