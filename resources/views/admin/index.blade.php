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
                        <div class="stats-title text-inverse-lighter">TODAY'S VISITS</div>
                        <div class="stats-number">7,842,900</div>
                        <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 70.1%;"></div>
                        </div>
                        <div class="stats-desc text-inverse-lighter">Better than last week (70.1%)</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-white text-inverse">
                    <div class="stats-icon stats-icon-square bg-gradient-blue text-white"><i class="ion-ios-pricetags"></i></div>
                    <div class="stats-content">
                        <div class="stats-title text-inverse-lighter">TODAY'S PROFIT</div>
                        <div class="stats-number">180,200</div>
                        <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 40.5%;"></div>
                        </div>
                        <div class="stats-desc text-inverse-lighter">Better than last week (40.5%)</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-white text-inverse">
                    <div class="stats-icon stats-icon-square bg-gradient-blue text-white"><i class="ion-ios-cart"></i></div>
                    <div class="stats-content">
                        <div class="stats-title text-inverse-lighter">NEW ORDERS</div>
                        <div class="stats-number">38,900</div>
                        <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 76.3%;"></div>
                        </div>
                        <div class="stats-desc text-inverse-lighter">Better than last week (76.3%)</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-xl-3 col-md-6">
                <div class="widget widget-stats bg-white text-inverse">
                    <div class="stats-icon stats-icon-square bg-gradient-blue text-white"><i class="ion-ios-chatboxes"></i></div>
                    <div class="stats-content">
                        <div class="stats-title text-inverse-lighter">NEW COMMENTS</div>
                        <div class="stats-number">3,988</div>
                        <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 54.9%;"></div>
                        </div>
                        <div class="stats-desc text-inverse-lighter">Better than last week (54.9%)</div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
        
@endsection