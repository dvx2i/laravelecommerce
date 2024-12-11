@extends('layouts.app')

@section('content')
    <!-- BEGIN #checkout-cart -->
    <div class="section-container" id="checkout-cart">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN checkout -->
            <div class="checkout">
                <form method="POST" name="form_checkout">
                    <!-- BEGIN checkout-body -->
                    <div class="checkout-body">
                        <!-- BEGIN checkout-message -->
                        <div class="checkout-message">
                            <h1>Thank you! <small>Your Payment has been successfully processed with the following details.</small></h1>
                            <div class="table-responsive2">
                                <table class="table table-payment-summary">
                                    <tbody>
                                        <tr>
                                            <td class="field">Transaction Status</td>
                                            <td class="value">Success</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Transaction Reference No.</td>
                                            <td class="value">ORDER-{{ $order->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Transaction Date and Time</td>
                                            <td class="value">{{ $order->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Orders</td>
                                            <td class="value product-summary">
                                                @foreach ($orderItems as $item)
                                                <div class="product-summary-img">
                                                    <img src="{{ asset('uploads/products') }}/{{ $item->product->image }}" alt="" />
                                                </div>
                                                <div class="product-summary-info">
                                                    <div class="title">{{ $item->product->name }}</div>
                                                    <div class="desc">Qty : {{ $item->qty }}</div>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="field">Payment Amount</td>
                                            <td class="value">Rp. {{ number_format($order->total_price, 2) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-silver-darker text-center m-b-0">Should you require any assistance, you can get in touch with Support Team at (123) 456-7890</p>
                        </div>
                        <!-- END checkout-message -->
                    </div>
                    <!-- END checkout-body -->
                    <!-- BEGIN checkout-footer -->
                    <div class="checkout-footer text-center">
                        <a href="{{ route('shop.order') }}" class="btn btn-white btn-theme">MANAGE ORDERS</a>
                    </div>
                    <!-- END checkout-footer -->
                </form>
            </div>
            <!-- END checkout -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #checkout-cart -->
@endsection