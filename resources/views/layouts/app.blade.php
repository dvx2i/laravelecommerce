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
		<div id="header" class="header">
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
								<li class="active"><a href="{{ route('home.index') }}">Home</a></li>
								<li class="dropdown dropdown-full-width dropdown-hover">
									<a href="#" data-toggle="dropdown">
										Our Store 
										<b class="caret"></b>
										<span class="arrow top"></span>
									</a>
									<!-- BEGIN dropdown-menu -->
									<div class="dropdown-menu p-0">
										<!-- BEGIN dropdown-menu-container -->
										<div class="dropdown-menu-container">
											<!-- BEGIN dropdown-menu-sidebar -->
											<div class="dropdown-menu-sidebar">
												<h4 class="title">Shop By Categories</h4>
												<ul class="dropdown-menu-list">
													<li><a href="product.html">Mobile Phone</a></li>
													<li><a href="product.html">Tablet</a></li>
													<li><a href="product.html">Laptop</a></li>
													<li><a href="product.html">Desktop</a></li>
													<li><a href="product.html">TV</a></li>
													<li><a href="product.html">Speaker</a></li>
													<li><a href="product.html">Gadget</a></li>
												</ul>
											</div>
											<!-- END dropdown-menu-sidebar -->
											<!-- BEGIN dropdown-menu-content -->
											<div class="dropdown-menu-content">
												<h4 class="title">Shop By Popular Phone</h4>
												<div class="row">
													<div class="col-lg-3">
														<ul class="dropdown-menu-list">
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 7</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 6s</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 6</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 5s</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> iPhone 5</a></li>
														</ul>
													</div>
													<div class="col-lg-3">
														<ul class="dropdown-menu-list">
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy S7</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy A9</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy J3</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy Note 5</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Galaxy S7</a></li>
														</ul>
													</div>
													<div class="col-lg-3">
														<ul class="dropdown-menu-list">
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 730</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 735</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 830</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia 820</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Lumia Icon</a></li>
														</ul>
													</div>
													<div class="col-lg-3">
														<ul class="dropdown-menu-list">
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia X</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia Z5</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia M5</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia C5</a></li>
															<li><a href="product_detail.html"><i class="fa fa-fw fa-angle-right text-muted"></i> Xperia C4</a></li>
														</ul>
													</div>
												</div>
												<h4 class="title">Shop By Brand</h4>
												<ul class="dropdown-brand-list m-b-0">
													<li><a href="product.html"><img src="{{ asset('frontend/assets/img/brand/brand-apple.png') }}" alt="" /></a></li>
													<li><a href="product.html"><img src="{{ asset('frontend/assets/img/brand/brand-samsung.png') }}" alt="" /></a></li>
													<li><a href="product.html"><img src="{{ asset('frontend/assets/img/brand/brand-htc.png') }}" alt="" /></a></li>
													<li><a href="product.html"><img src="{{ asset('frontend/assets/img/brand/brand-microsoft.png') }}" alt="" /></a></li>
													<li><a href="product.html"><img src="{{ asset('frontend/assets/img/brand/brand-nokia.png') }}" alt="" /></a></li>
													<li><a href="product.html"><img src="{{ asset('frontend/assets/img/brand/brand-blackberry.png') }}" alt="" /></a></li>
													<li><a href="product.html"><img src="{{ asset('frontend/assets/img/brand/brand-sony.png') }}" alt="" /></a></li>
												</ul>
											</div>
											<!-- END dropdown-menu-content -->
										</div>
										<!-- END dropdown-menu-container -->
									</div>
									<!-- END dropdown-menu -->
								</li>
								<li class="dropdown dropdown-hover">
									<a href="#" data-toggle="dropdown">
										Accessories 
										<b class="caret"></b>
										<span class="arrow top"></span>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="product.html">Mobile Phone</a>
										<a class="dropdown-item" href="product.html">Tablet</a>
										<a class="dropdown-item" href="product.html">TV</a>
										<a class="dropdown-item" href="product.html">Desktop</a>
										<a class="dropdown-item" href="product.html">Laptop</a>
										<a class="dropdown-item" href="product.html">Speaker</a>
										<a class="dropdown-item" href="product.html">Gadget</a>
									</div>
								</li>
								<li><a href="product.html">New Arrival</a></li>
								<li class="dropdown dropdown-hover">
									<a href="#" data-toggle="dropdown">
										Pages
										<b class="caret"></b>
										<span class="arrow top"></span>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{ route('home.index') }}">Home (Default)</a>
										<a class="dropdown-item" href="index_fixed_header.html">Home (Fixed Header)</a>
										<a class="dropdown-item" href="index_inverse_header.html">Home (Inverse Header)</a>
										<a class="dropdown-item" href="search_results.html">Search Results</a>
										<a class="dropdown-item" href="product.html">Product Page</a>
										<a class="dropdown-item" href="product_detail.html">Product Details Page</a>
										<a class="dropdown-item" href="checkout_cart.html">Checkout Cart</a>
										<a class="dropdown-item" href="checkout_info.html">Checkout Shipping</a>
										<a class="dropdown-item" href="checkout_payment.html">Checkout Payment</a>
										<a class="dropdown-item" href="checkout_complete.html">Checkout Complete</a>
										<a class="dropdown-item" href="my_account.html">My Account</a>
										<a class="dropdown-item" href="contact_us.html">Contact Us</a>
										<a class="dropdown-item" href="about_us.html">About Us</a>
										<a class="dropdown-item" href="faq.html">FAQ</a>
									</div>
								</li>
								<li class="dropdown dropdown-hover">
									<a href="#" data-toggle="dropdown">
										<i class="fa fa-search search-btn"></i>
										<span class="arrow top"></span>
									</a>
									<div class="dropdown-menu p-15">
										<form action="search_results.html" method="POST" name="search_form">
											<div class="input-group">
												<input type="text" placeholder="Search" class="form-control bg-silver-lighter" />
												<div class="input-group-append">
													<button class="btn btn-inverse" type="submit"><i class="fa fa-search"></i></button>
												</div>
											</div>
										</form>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- END header-nav -->
					<!-- BEGIN header-nav -->
					<div class="header-nav">
						<ul class="nav pull-right">
							<li class="dropdown dropdown-hover">
								<a href="#" class="header-cart" data-toggle="dropdown">
									<i class="fa fa-shopping-bag"></i>
									<span class="total">2</span>
									<span class="arrow top"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-cart p-0">
									<div class="cart-header">
										<h4 class="cart-title">Shopping Bag (1) </h4>
									</div>
									<div class="cart-body">
										<ul class="cart-item">
											<li>
												<div class="cart-item-image"><img src="{{ asset('frontend/assets/img/product/product-ipad.jpg') }}" alt="" /></div>
												<div class="cart-item-info">
													<h4>iPad Pro Wi-Fi 128GB - Silver</h4>
													<p class="price">$699.00</p>
												</div>
												<div class="cart-item-close">
													<a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
												</div>
											</li>
											<li>
												<div class="cart-item-image"><img src="{{ asset('frontend/assets/img/product/product-imac.jpg') }}" alt="" /></div>
												<div class="cart-item-info">
													<h4>21.5-inch iMac</h4>
													<p class="price">$1299.00</p>
												</div>
												<div class="cart-item-close">
													<a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
												</div>
											</li>
											<li>
												<div class="cart-item-image"><img src="{{ asset('frontend/assets/img/product/product-iphone.png') }}" alt="" /></div>
												<div class="cart-item-info">
													<h4>iPhone 6s 16GB - Silver</h4>
													<p class="price">$649.00</p>
												</div>
												<div class="cart-item-close">
													<a href="#" data-toggle="tooltip" data-title="Remove">&times;</a>
												</div>
											</li>
										</ul>
									</div>
									<div class="cart-footer">
										<div class="row row-space-10">
											<div class="col-6">
												<a href="checkout_cart.html" class="btn btn-default btn-theme btn-block">View Cart</a>
											</div>
											<div class="col-6">
												<a href="checkout_cart.html" class="btn btn-inverse btn-theme btn-block">Checkout</a>
											</div>
										</div>
									</div>
								</div>
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
