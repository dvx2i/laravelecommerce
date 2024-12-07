@extends('layouts.app')

@section('content')
    <!-- BEGIN #my-account -->
    <div id="about-us-cover" class="section-container">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN breadcrumb -->
            <ul class="breadcrumb mb-3">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Store</a></li>
                <li class="breadcrumb-item active">My Account</li>
            </ul>
            <!-- END breadcrumb -->
            <!-- BEGIN account-container -->
            <div class="account-container">
                <!-- BEGIN account-sidebar -->
                <div class="account-sidebar">
                    <div class="account-sidebar-cover">
                        <img src=""{{ asset('frontend/assets/img/cover/cover-14.jpg') }}" alt="" />
                    </div>
                    <div class="account-sidebar-content">
                        <h4>Your Account</h4>
                        <p class="mb-2 mb-lg-4">
                            Modify an order, track a shipment, and update your account info.
                        </p>
                        <p class="mb-2 mb-lg-4">
                            All you need in one place. All with a few simple clicks.
                        </p>
                    </div>
                </div>
                <!-- END account-sidebar -->
                <!-- BEGIN account-body -->
                <div class="account-body">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-6 -->
                        <div class="col-md-6">
                            <h4><i class="fab fa-gitlab fa-fw text-primary"></i> Orders</h4>
                            <ul class="nav nav-list">
                                <li><a href="#">Check the status of an order</a></li>
                                <li><a href="#">Track a shipment</a></li>
                                <li><a href="#">Pre-sign for a delivery</a></li>
                                <li><a href="#">Cancel items</a></li>
                                <li><a href="#">Print an invoice</a></li>
                                <li><a href="#">Return items</a></li>
                                <li><a href="#">Change shipping or billing info for an order</a></li>
                                <li><a href="#">Edit gift messaging or engraving</a></li>
                                <li><a href="#">View order history</a></li>
                            </ul>
                            <h4><i class="fa fa-universal-access fa-fw text-primary"></i> Account Settings</h4>
                            <ul class="nav nav-list">
                                <li><a href="#">Update your email address and password</a></li>
                                <li><a href="#">Change your default shipping or billing info</a></li>
                                <li><a href="#">Manage email subscriptions</a></li>
                            </ul>
                        </div>
                        <!-- END col-6 -->
                        <!-- BEGIN col-6 -->
                        <div class="col-md-6">
                            <h4><i class="fab fa-cc-visa fa-fw text-primary"></i> Payments & Financing</h4>
                            <ul class="nav nav-list">
                                <li><a href="#">Check the balance of a gift card</a></li>
                                <li><a href="#">Check the status of a rebate</a></li>
                            </ul>
                            <h4><i class="fab fa-wpforms fa-fw text-primary"></i> Specialists</h4>
                            <ul class="nav nav-list">
                                <li><a href="#">View your previous activity</a></li>
                            </ul>
                        </div>
                        <!-- END col-6 -->
                    </div>
                    <!-- END row -->
                </div>
                <!-- END account-body -->
            </div>
            <!-- END account-container -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #about-us-cover -->
@endsection