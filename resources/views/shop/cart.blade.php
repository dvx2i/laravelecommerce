@extends('layouts.app')

@section('content')
<!-- BEGIN #checkout-cart -->
<div class="section-container" id="checkout-cart">
    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN checkout -->
        <div class="checkout">
            <form action="{{ route('shop.order.store') }}" method="POST">
                @csrf
                <!-- BEGIN checkout-body -->
                <div class="checkout-body">
                    <div class="table-responsive">
                        @if ($cart)
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($cartItems as $item)
                                <tr>
                                    <td class="cart-product">
                                        <input type="hidden" name="product_id[]" value="{{ $item->product->id }}">

                                        <div class="product-img">
                                            <img src="{{ asset('uploads/products') }}/{{ $item->product->image }}" alt="" />
                                        </div>
                                        <div class="product-info">
                                            <div class="title">{{ $item->product->name }}</div>
                                            <div class="desc">{{ Str::of($item->product->description_1)->words(3, '') }}</div>
                                        </div>
                                    </td>
                                    <td class="cart-price text-center">Rp. {{ number_format($item->product->sale_price, 2) }}</td>
                                    <td class="cart-qty text-center">
                                        <div class="cart-qty-input">
                                            <a href="#" class="qty-control left disabled" data-click="decrease-qty" data-target="#qty"><i class="fa fa-minus"></i></a>
                                            <input type="text" name="qty[]" value="{{ $item->qty }}" class="form-control" />
                                            <a href="#" class="qty-control right disabled" data-click="increase-qty" data-target="#qty"><i class="fa fa-plus"></i></a>
                                        </div>
                                        <div class="qty-desc">1 to max order</div>
                                    </td>
                                    <td class="cart-total text-center">
                                        Rp. {{ number_format($item->qty * $item->product->sale_price, 2) }}
                                        @php
                                            $total += $item->qty * $item->product->sale_price;
                                        @endphp
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="cart-summary" colspan="4">
                                        <div class="summary-container">
                                            <div class="summary-row">
                                                <div class="field">Cart Subtotal</div>
                                                <div class="value value_total">Rp. {{ number_format($total, 2) }}</div>
                                            </div>
                                            <div class="summary-row text-danger">
                                                <div class="field">Free Shipping</div>
                                                <div class="value">$0.00</div>
                                            </div>
                                            <div class="summary-row total">
                                                <div class="field">Total</div>
                                                <div class="value value_total">Rp. {{ number_format($total, 2) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @else
                        <table class="table table-cart">
                            <tr><td class="text-center">Cart is empty</td></tr>
                        </table>
                        @endif
                    </div>
                </div>
                <!-- END checkout-body -->
                <!-- BEGIN checkout-footer -->
                <div class="checkout-footer">
                    <a href="{{ route('shop.product') }}" class="btn btn-white btn-lg pull-left btn-theme">CONTINUE SHOPPING</a>
                    @if ($cart)
                    <button type="submit" class="btn btn-inverse btn-lg btn-theme width-200">CHECKOUT</button>
                    @endif
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