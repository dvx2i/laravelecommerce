@extends('layouts.admin')

@section('content')
    <!-- begin breadcrumb -->
        <ol class="breadcrumb float-xl-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Dashboard </h1>
        <!-- end page-header -->
        
        <!-- begin row -->
        <div class="row">
            <!-- begin col-3 -->
            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-white text-inverse">
                    <div class="stats-icon stats-icon-square bg-gradient-blue text-white"><i class="ion-ios-analytics"></i></div>
                    <div class="stats-content">
                        <div class="stats-title text-inverse-lighter">USERS</div>
                        <div class="stats-number">{{ $totalUser }}</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-white text-inverse">
                    <div class="stats-icon stats-icon-square bg-gradient-blue text-white"><i class="ion-ios-pricetags"></i></div>
                    <div class="stats-content">
                        <div class="stats-title text-inverse-lighter">BRANDS</div>
                        <div class="stats-number">{{ $totalBrand }}</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-white text-inverse">
                    <div class="stats-icon stats-icon-square bg-gradient-blue text-white"><i class="ion-ios-cart"></i></div>
                    <div class="stats-content">
                        <div class="stats-title text-inverse-lighter">ORDERS</div>
                        <div class="stats-number">{{ $totalOrder }}</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-white text-inverse">
                    <div class="stats-icon stats-icon-square bg-gradient-blue text-white"><i class="ion-ios-chatboxes"></i></div>
                    <div class="stats-content">
                        <div class="stats-title text-inverse-lighter">PRODUCTS</div>
                        <div class="stats-number">{{ $totalProduct }}</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
        
@endsection