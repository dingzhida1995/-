@extends('layout.index')
@section('title','微商城首页')
@section('content')

	<!-- slider -->
	<div class="slider">

		<ul class="slides">
			<li>
				<img src="/index/img/slide1.jpg" alt="">
				<div class="caption slider-content  center-align">
					<h2>WELCOME TO MSTORE</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="/index/img/slide2.jpg" alt="">
				<div class="caption slider-content center-align">
					<h2>JACKETS BUSINESS</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
			<li>
				<img src="/index/img/slide3.jpg" alt="">
				<div class="caption slider-content center-align">
					<h2>FASHION SHOP</h2>
					<h4>Lorem ipsum dolor sit amet.</h4>
					<a href="" class="btn button-default">SHOP NOW</a>
				</div>
			</li>
		</ul>

	</div>
	<!-- end slider -->

	<!-- features -->
	<div class="features section">
		<div class="container">
			<div class="row">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-car"></i>
						</div>
						<h6>Free Shipping</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-dollar"></i>
						</div>
						<h6>Money Back</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
			<div class="row margin-bottom-0">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-lock"></i>
						</div>
						<h6>Secure Payment</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-support"></i>
						</div>
						<h6>24/7 Support</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end features -->

	<!-- quote -->
	<div class="section quote">
		<div class="container">
			<h4>FASHION UP TO 50% OFF</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
		</div>
	</div>
	<!-- end quote -->
	<!-- 热门商品 -->
<div class="section product">
	<div class="container">
		<div class="section-head">
			<h4>NEW PRODUCT</h4>
			<div class="divider-top"></div>
			<div class="divider-bottom"></div>
		</div>
		<div class="row">
			@foreach($dada as $val)
			<div class="col s6">
				<div class="content">
					<img src="{{asset($val->img)}}" alt="" width="600" height="700">
					<h6><a href="">{{$val->name}}</a></h6>
					<div class="price">
						${{$val->price}} <!-- <span>$</span> -->
					</div>
					<a href="/home/goodsxx?id={{$val->id}}" class="btn button-default">查看商品</a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

<!-- 广告 -->
<div class="promo section">
	<div class="container">
		<div class="content">
			<h4>PRODUCT BUNDLE</h4>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
			<button class="btn button-default">SHOP NOW</button>
		</div>
	</div>
</div>
<!-- end promo -->

<!-- 正常商品 -->
<div class="section product">
	<div class="container">
		<div class="section-head">
			<h4>TOP PRODUCT</h4>
			<div class="divider-top"></div>
			<div class="divider-bottom"></div>
		</div>
		<div class="row">
			@foreach($data as $val)
				<div class="col s6">
					<div class="content">
						<img src="{{asset($val->img)}}" alt="" >
						<h6><a href="">{{$val->name}}</a></h6>
						<div class="price">
							${{$val->price}} <!-- <span>$</span> -->
						</div>
						<a href="/home/goodsxx?id={{$val->id}}" class="btn button-default">查看商品</a>
					</div>
				</div>
			@endforeach
		</div>
		<div class="pagination-product">
			{{$data->links()}}<br>
		</div>
	</div>
</div>
<!-- end product -->
		
		
	
@endsection
<!-- <script src="/jquery-3.3.1.js"></script>
<script type="text/javascript">

</script> -->