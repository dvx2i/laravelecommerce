@extends('layouts.app')

@section('content')
<!-- BEGIN #checkout-cart -->
<div class="section-container" id="checkout-cart">
    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN checkout -->
        <div class="checkout">
            <!-- BEGIN checkout-body -->
            <div class="checkout-body">
                <div class="table-responsive">
                    @if ($orders->isNotEmpty())
                    <table class="table table-cart">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total Amount</th>
                                <th class="text-center">Order Status</th>
                                <th class="text-center">Payment Status</th>
                                <th class="text-center">Detail</th>
                            </tr>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->items()->sum('qty') }}</td>
                                    <td class="text-center">Rp. {{ number_format($item->total_price, 2) }}</td>
                                    <td class="text-center"><span class="total">{{ $item->order_status }}</span></td>
                                    <td class="text-center">{!! $item->payment_status != 'pending' ? $item->payment_status : '<button type="button" class="btn btn-success">Pay Now</button>' !!}</td>
                                    <td><a href="{{ route('shop.order.show', ['order' => $item->id]) }}" class="btn btn-grey">Details</a></td>
                                </tr>
                            @endforeach
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    @else
                    <table class="table table-cart">
                        <tr><td class="text-center">Orders is empty</td></tr>
                    </table>
                    @endif
                </div>
            </div>
            <!-- END checkout-body -->
        </div>
        <!-- END checkout -->
    </div>
    <!-- END container -->
</div>
<!-- END #checkout-cart -->
@endsection