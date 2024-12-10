<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="Laravel Ecommerce" name="description" />
	<meta content="Dwi Tsalis" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/css/e-commerce/app.min.css') }}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->

    @stack('styles');

</head>
<body>
    
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade show">
		<!-- BEGIN #top-nav -->
		<div id="top-nav" class="top-nav">
			<!-- BEGIN container -->
			<div class="container">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown dropdown-hover">
							<a href="#" data-toggle="dropdown"><img src="{{ asset('frontend/assets/img/flag/flag-english.png') }}" class="flag-img" alt="" /> English <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#" class="dropdown-item"><img src="{{ asset('frontend/assets/img/flag/flag-english.png') }}" class="flag-img" alt="" /> English</a></li>
								<li><a href="#" class="dropdown-item"><img src="{{ asset('frontend/assets/img/flag/flag-german.png') }}" class="flag-img" alt="" /> German</a></li>
								<li><a href="#" class="dropdown-item"><img src="{{ asset('frontend/assets/img/flag/flag-spanish.png') }}" class="flag-img" alt="" /> Spanish</a></li>
								<li><a href="#" class="dropdown-item"><img src="{{ asset('frontend/assets/img/flag/flag-french.png') }}" class="flag-img" alt="" /> French</a></li>
								<li><a href="#" class="dropdown-item"><img src="{{ asset('frontend/assets/img/flag/flag-chinese.png') }}" class="flag-img" alt="" /> Chinese</a></li>
							</ul>
						</li>
						<li><a href="#">Customer Care</a></li>
						<li><a href="#">Order Tracker</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Career</a></li>
						<li><a href="#">Our Forum</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#"><i class="fab fa-facebook-f f-s-14"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter f-s-14"></i></a></li>
						<li><a href="#"><i class="fab fa-instagram f-s-14"></i></a></li>
						<li><a href="#"><i class="fab fa-dribbble f-s-14"></i></a></li>
						<li><a href="#"><i class="fab fa-google f-s-14"></i></a></li>
					</ul>
				</div>
			</div>
			<!-- END container -->
		</div>
		<!-- END #top-nav -->
		<!-- BEGIN #header -->
		<div id="header" class="header"  data-fixed-top="true">
			<!-- BEGIN container -->
			<div class="container">
				<!-- BEGIN header-container -->
				<div class="header-container">
					<!-- BEGIN navbar-toggle -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- END navbar-toggle -->
					<!-- BEGIN header-logo -->
					<div class="header-logo">
						<a href="{{ route('home.index') }}">
							<span class="brand-logo"></span>
							<span class="brand-text">
								<span class="text-primary">Laravel</span>Ecommerce
								<small>shop with love</small>
							</span>
						</a>
					</div>
					<!-- END header-logo -->
					<!-- BEGIN header-nav -->
					<div class="header-nav">
						<div class=" collapse navbar-collapse" id="navbar-collapse">
							<ul class="nav">
								<li class="{{ Request::segment(2) == '' ? 'active' : '' }}"><a href="{{ route('home.index') }}">Home</a></li>
								<li class="{{ Request::segment(2) === 'product' ? 'active' : '' }}"><a href="{{ route('shop.product') }}">Products</a></li>
								<li class="{{ Request::segment(2) === 'cart' ? 'active' : '' }}"><a href="{{ route('shop.cart') }}">Carts</a></li>
								<li class="{{ Request::segment(2) == 'orders' || Request::segment(2) == 'order' ? 'active' : '' }}"><a href="{{ route('shop.order') }}">Orders</a></li>
								<li>
									<form action="search_results.html" method="POST" name="search_form" style="line-height: 3.5rem;
																											padding: 1rem .9rem;
																											text-decoration: none;
																											display: block;
																											position: relative;">
										<div class="input-group">
											<input type="text" placeholder="Search" class="form-control bg-silver-lighter" />
											<div class="input-group-append">
												<button class="btn btn-inverse" type="submit"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>
								</li>
							</ul>
						</div>
					</div>
					<!-- END header-nav -->
					<!-- BEGIN header-nav -->
					<div class="header-nav">
						<ul class="nav pull-right">
							<li class="dropdown dropdown-hover">
								<a href="{{ route('shop.cart') }}" class="header-cart">
									<i class="fa fa-shopping-bag"></i>
									<span class="total" id="total_cart">{{ Session::get('cart_total_quantity', 0) }}</span>
									<span class="arrow top"></span>
								</a>
							</li>
							<li class="divider"></li>
							<li class="dropdown dropdown-hover">
                                @guest
								<a href="{{ route('login') }}" class="header-cart">
									<i class="fa fa-user"></i> 
									<span class="d-none d-xl-inline">Login / Register</span>
								</a>
                                @else
								<a href="#" data-toggle="dropdown">
									<i class="fa fa-user"></i> 
									<span class="d-none d-xl-inline">{{ Auth::user()->name }}</span>
								</a>
								<div class="dropdown-menu">
									@if (Auth::user()->role === 'ADMIN')
									<a class="dropdown-item" href="{{ route('admin.index') }}">Admin</a>
									@endif 
									<a class="dropdown-item" href="{{ route('user.index') }}">My Account</a>
									<form method="post" action="{{ route('logout') }}" id="logout-form">
										@csrf
										<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();$('#logout-form').submit();">Log Out</a>
									</form>
								</div>
                                @endguest
							</li>
						</ul>
					</div>
					<!-- END header-nav -->
				</div>
				<!-- END header-container -->
			</div>
			<!-- END container -->
		</div>
		<!-- END #header -->
		
        @yield('content')
		
		<!-- BEGIN #footer -->
		<div id="footer" class="footer">
			<!-- BEGIN container -->
			<div class="container">
				<!-- BEGIN row -->
				<div class="row">
					<!-- BEGIN col-3 -->
					<div class="col-lg-3">
						<h4 class="footer-header">ABOUT US</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec tristique dolor, ac efficitur velit. Nulla lobortis tempus convallis. Nulla aliquam lectus eu porta pulvinar. Mauris semper justo erat. 
						</p>
						<p class="mb-lg-4 mb-0">
							Vestibulum porttitor lorem et vestibulum pharetra. Phasellus sit amet mi congue, hendrerit mi ut, dignissim eros.
						</p>
					</div>
					<!-- END col-3 -->
					<!-- BEGIN col-3 -->
					<div class="col-lg-3">
						<h4 class="footer-header">RELATED LINKS</h4>
						<ul class="fa-ul mb-lg-4 mb-0">
							<li><i class="fa fa-li fa-angle-right"></i> <a href="#">Shopping Help</a></li>
							<li><i class="fa fa-li fa-angle-right"></i> <a href="#">Terms of Use</a></li>
							<li><i class="fa fa-li fa-angle-right"></i> <a href="#">Contact Us</a></li>
							<li><i class="fa fa-li fa-angle-right"></i> <a href="#">Careers</a></li>
							<li><i class="fa fa-li fa-angle-right"></i> <a href="#">Payment Method</a></li>
							<li><i class="fa fa-li fa-angle-right"></i> <a href="#">Sales & Refund</a></li>
							<li><i class="fa fa-li fa-angle-right"></i> <a href="#">Sitemap</a></li>
							<li><i class="fa fa-li fa-angle-right"></i> <a href="#">Privacy & Policy</a></li>
						</ul>
					</div>
					<!-- END col-3 -->
					<!-- BEGIN col-3 -->
					<div class="col-lg-3">
						<h4 class="footer-header">LATEST PRODUCT</h4>
						<ul class="list-unstyled list-product mb-lg-4 mb-0">
							<li>
								<div class="image">
									<img src="{{ asset('frontend/assets/img/product/product-iphone-6s.jpg') }}" alt="" />
								</div>
								<div class="info">
									<h4 class="info-title">Iphone 6s</h4>
									<div class="price">$1200.00</div>
								</div>
							</li>
							<li>
								<div class="image">
									<img src="{{ asset('frontend/assets/img/product/product-galaxy-s6.jpg') }}" alt="" />
								</div>
								<div class="info">
									<h4 class="info-title">Samsung Galaxy s7</h4>
									<div class="price">$850.00</div>
								</div>
							</li>
							<li>
								<div class="image">
									<img src="{{ asset('frontend/assets/img/product/product-ipad-pro.jpg') }}" alt="" />
								</div>
								<div class="info">
									<h4 class="info-title">Ipad Pro</h4>
									<div class="price">$800.00</div>
								</div>
							</li>
							<li>
								<div class="image">
									<img src="{{ asset('frontend/assets/img/product/product-galaxy-note5.jpg') }}" alt="" />
								</div>
								<div class="info">
									<h4 class="info-title">Samsung Galaxy Note 5</h4>
									<div class="price">$1200.00</div>
								</div>
							</li>
						</ul>
					</div>
					<!-- END col-3 -->
					<!-- BEGIN col-3 -->
					<div class="col-lg-3">
						<h4 class="footer-header">OUR CONTACT</h4>
						<address class="mb-lg-4 mb-0">
							<strong>Twitter, Inc.</strong><br />
							1355 Market Street, Suite 900<br />
							San Francisco, CA 94103<br /><br />
							<abbr title="Phone">Phone:</abbr> (123) 456-7890<br />
							<abbr title="Fax">Fax:</abbr> (123) 456-7891<br />
							<abbr title="Email">Email:</abbr> <a href="mailto:sales@myshop.com">sales@myshop.com</a><br />
							<abbr title="Skype">Skype:</abbr> <a href="skype:myshop">myshop</a>
						</address>
					</div>
					<!-- END col-3 -->
				</div>
				<!-- END row -->
			</div>
			<!-- END container -->
		</div>
		<!-- END #footer -->
		
		<!-- BEGIN #footer-copyright -->
		<div id="footer-copyright" class="footer-copyright">
			<!-- BEGIN container -->
			<div class="container">
				<div class="payment-method">
					<img src="{{ asset('frontend/assets/img/payment/payment-method.png') }}" alt="" />
				</div>
				<div class="copyright">
					Copyright &copy; All rights reserved.
				</div>
			</div>
			<!-- END container -->
		</div>
		<!-- END #footer-copyright -->
	</div>
	<!-- END #page-container -->
    
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('frontend/assets/js/e-commerce/app.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

    @stack('scripts')

</body>
</html>
