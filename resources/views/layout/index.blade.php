<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
	<title>Mstore - Online Shop Mobile Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="HandheldFriendly" content="True">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{asset('/index/css/materialize.css')}}">
	<link rel="stylesheet" href="{{asset('/index/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('/index/css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('/index/css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('/index/css/owl.theme.css')}}">
	<link rel="stylesheet" href="{{asset('/index/css/owl.transitions.css')}}">
	<link rel="stylesheet" href="{{asset('/index/css/fakeLoader.css')}}">
	<link rel="stylesheet" href="{{asset('/index/css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('/index/css/style.css')}}">

	<link rel="shortcut icon" href="{{asset('/index/img/favicon.png')}}">

</head>
<body>

<!-- navbar top -->
<div class="navbar-top">
	<!-- site brand	 -->
	<div class="site-brand">
		<a href="index.html"><h1>Mstore</h1></a>
	</div>
	<!-- end site brand	 -->
	<div class="side-nav-panel-right">
		<a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
	</div>
</div>
<!-- end navbar top -->

<!-- side nav right-->
<div class="side-nav-panel-right">
	<ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
		@if(session('login'))
			<li class="profil">
				<img src="{{asset('/index/img/profile.jpg')}}" alt="">
				<h2>{{session('login')}}</h2>
			</li>
			<li><a href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
			<li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
			<li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
			<li><a href="{{url('home/orderlist')}}"><i class="fa fa-credit-card"></i>查看订单</a></li>
			<li><a href="{{url('home/loginout')}}"><i class="fa fa-sign-in"></i>退出登入</a></li>
		@else
			<li class="profil">
				<img src="{{asset('/index/img/profile.jpg')}}" alt="">
				<h2>请登入</h2>
			</li>
			<li><a href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
			<li><a href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
			<li><a href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
			<li><a href="{{url('home/login')}}"><i class="fa fa-sign-in"></i>Login</a></li>
			<li><a href="{{url('home/register')}}"><i class="fa fa-user-plus"></i>Register</a></li>
		@endif

	</ul>
</div>
<!-- end side nav right-->

<!-- navbar bottom -->
<div class="navbar-bottom">
	<div class="row">
		<div class="col s2">
			<a href="index.html"><i class="fa fa-home"></i></a>
		</div>
		<div class="col s2">
			<a href="wishlist.html"><i class="fa fa-heart"></i></a>
		</div>
		<div class="col s4">
			<div class="bar-center">
				<a href="#animatedModal" id="cart-menu"><i class="fa fa-shopping-basket"></i></a>
				<span>2</span>
			</div>
		</div>
		<div class="col s2">
			<a href="contact.html"><i class="fa fa-envelope-o"></i></a>
		</div>
		<div class="col s2">
			<a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
		</div>
	</div>
</div>
<!-- end navbar bottom -->

<!-- menu -->
<div class="menus" id="animatedModal2">
	<div class="close-animatedModal2 close-icon">
		<i class="fa fa-close"></i>
	</div>
	<div class="modal-content">
		<div class="container">
			<div class="row">
				<div class="col s4">
					<a href="index.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-home"></i>
							</div>
							Home
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="product-list.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-bars"></i>
							</div>
							Product List
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="shop-single.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-eye"></i>
							</div>
							Single Shop
						</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col s4">
					<a href="wishlist.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-heart"></i>
							</div>
							Wishlist
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="cart.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-shopping-cart"></i>
							</div>
							Cart
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="checkout.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-credit-card"></i>
							</div>
							Checkout
						</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col s4">
					<a href="blog.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-bold"></i>
							</div>
							Blog
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="blog-single.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-file-text-o"></i>
							</div>
							Blog Single
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="error404.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-hourglass-half"></i>
							</div>
							404
						</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col s4">
					<a href="testimonial.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-support"></i>
							</div>
							Testimonial
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="about-us.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-user"></i>
							</div>
							About Us
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="contact.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-envelope-o"></i>
							</div>
							Contact
						</div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col s4">
					<a href="setting.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-cog"></i>
							</div>
							Settings
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="login.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-sign-in"></i>

							</div>
							Login
						</div>
					</a>
				</div>
				<div class="col s4">
					<a href="register.html" class="button-link">
						<div class="menu-link">
							<div class="icon">
								<i class="fa fa-user-plus"></i>
							</div>
							Register
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end menu -->

<!-- cart menu -->
<div class="menus" id="animatedModal">
	<div class="close-animatedModal close-icon">
		<i class="fa fa-close"></i>
	</div>
	<div class="modal-content">
		<div class="cart-menu">
			<div class="container">
				<div class="content">
					<!--购物车-->
					@foreach($cart as $val)
					<div class="cart-1">
						<div class="row">
							<div class="col s5">
								<img src="{{asset($val->goods_pic)}}" alt="">
							</div>
							<div class="col s7">
								<h5><a href="">{{$val->goods_name}}</a></h5>
							</div>
						</div>
						<div class="row quantity">
							<div class="col s5">
								<h5>Quantity</h5>
							</div>
							<div class="col s7">
								<input value="1" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col s5">
								<h5>Price</h5>
							</div>
							<div class="col s7">
								<h5>${{$val->goods_price}}</h5>
							</div>
						</div>
						<div class="row">
							<div class="col s5">
								<h5>好衣服中国造!</h5>
							</div>
							<div class="col s7">
								<div class="action"><i class="fa fa-trash"></i></div>
							</div>
						</div>
					</div>
					@endforeach
					<div class="divider"></div>
				</div>
				<!--价格总结-->
				<div class="total">

					<div class="row">
						<div class="col s7">
							<h6>商品总价格</h6>
						</div>
						<div class="col s5">
							<h6>${{$num}}</h6>
						</div>
					</div>
				</div>
				<a  href="{{url('home/doorder')}}" class="btn button-default">确认订单</a>
			</div>
		</div>
	</div>
</div>
<!-- end cart menu -->


@section('content')
	<!-- //正常商品展示 -->
@show

<!-- loader -->
<div id="fakeLoader"></div>
<!-- end loader -->

<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="about-us-foot">
			<h6>Mstore</h6>
			<p>is a lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit.</p>
		</div>
		<div class="social-media">
			<a href=""><i class="fa fa-facebook"></i></a>
			<a href=""><i class="fa fa-twitter"></i></a>
			<a href=""><i class="fa fa-google"></i></a>
			<a href=""><i class="fa fa-linkedin"></i></a>
			<a href=""><i class="fa fa-instagram"></i></a>
		</div>
		<div class="copyright">
			<span>© 2017 All Right Reserved</span>
		</div>
	</div>
</div>
<!-- end footer -->

<!-- scripts -->
<script src="{{asset('/index/js/jquery.min.js')}}"></script>

<script src="{{asset('/index/js/materialize.min.js')}}"></script>
<script src="{{asset('/index/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/index/js/fakeLoader.min.js')}}"></script>
<script src="{{asset('/index/js/animatedModal.min.js')}}"></script>
<script src="{{asset('/index/js/main.js')}}"></script>

</body>
</html>