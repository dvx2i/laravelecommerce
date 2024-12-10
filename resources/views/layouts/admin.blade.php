<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin | Laravel Ecommerce</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="Laravel Ecommerce Admin" name="description" />
	<meta content="Dwi Tsalis" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="{{ asset('backend/assets/css/apple/app.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
	<link href="{{ asset('backend/assets/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet') }}" />
	<link href="{{ asset('backend/assets/plugins/nvd3/build/nv.d3.css') }}" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL CSS STYLE ================== -->

    @stack('styles');

</head>
<body>
    
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="{{ route('home.index') }}" class="navbar-brand"><span class="navbar-logo"><i class="ion-ios-cloud"></i></span> <b>Laravel</b> Ecommerce</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li class="dropdown navbar-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ion-ios-person"></i>
						<span class="d-none d-md-inline">{{ Auth::user()->name }}</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
                        <form method="post" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();$('#logout-form').submit();">Log Out</a>
                        </form>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<i class="ion-ios-person"></i>
							</div>
							<div class="info">
								<b class="caret"></b>
								{{ Auth::user()->name }}
								<small>{{ Auth::user()->role }}</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="javascript:;"><i class="ion-ios-cog"></i> Settings</a></li>
							<li><a href="javascript:;"><i class="ion-ios-share-alt"></i> Send Feedback</a></li>
							<li><a href="javascript:;"><i class="ion-ios-help"></i> Helps</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">General</li>
					<li class="{{ Request::segment(2) == '' ? 'active' : '' }}">
						<a href="{{ route('admin.index') }}">
							<i class="ion-ios-home bg-blue"></i> 
							<span>Dashboard</span> 
						</a>
					</li>
					<li class="nav-header">Data</li>
					<li class="has-sub {{ Request::segment(2) === 'brand' ? 'active' : '' }}">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="ion-ios-color-filter"></i>
							<span>Brands</span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="{{ route('admin.brand.create') }}">
									<i class="ion-ios-color-filter"></i> 
									<span>Add Brand</span> 
								</a>
							</li>
							<li>
								<a href="{{ route('admin.brand') }}">
									<i class="ion-ios-color-filter"></i> 
									<span>Brands</span> 
								</a>
							</li>
						</ul>
					</li>
					<li class="has-sub {{ Request::segment(2) === 'category' ? 'active' : '' }}">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="ion-ios-albums"></i>
							<span>Categories</span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="{{ route('admin.category.create') }}">
									<i class="ion-ios-albums"></i> 
									<span>Add Category</span> 
								</a>
							</li>
							<li>
								<a href="{{ route('admin.category') }}">
									<i class="ion-ios-albums"></i> 
									<span>Categories</span> 
								</a>
							</li>
						</ul>
					</li>
					<li class="has-sub {{ Request::segment(2) === 'product' ? 'active' : '' }}">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="ion-ios-phone-portrait"></i>
							<span>Products</span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="{{ route('admin.product.create') }}">
									<i class="ion-ios-phone-portrait"></i> 
									<span>Add Product</span> 
								</a>
							</li>
							<li>
								<a href="{{ route('admin.product') }}">
									<i class="ion-ios-phone-portrait"></i> 
									<span>Products</span> 
								</a>
							</li>
						</ul>
					</li>
					
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-back"></i> <span>Collapse</span></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			@yield('content')
		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->


	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
	<script src="{{ asset('backend/assets/js/theme/apple.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('backend/assets/plugins/d3/d3.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/nvd3/build/nv.d3.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
	{{-- <script src="{{ asset('backend/assets/js/demo/dashboard-v2.js') }}"></script> --}}
	<!-- ================== END PAGE LEVEL JS ================== -->
    
    @stack('scripts')

</body>
</html>
