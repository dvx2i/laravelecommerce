@extends('layouts.admin')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
    <li class="breadcrumb-item active">Order</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Details ORDER-{{ $order->id }}</h1>
<!-- end page-header -->

<div class="row">
    <div class="col-xl-4 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Customer</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td style="width: 1%">:</td>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td style="width: 1%">:</td>
                                <td>{{ $order->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td style="width: 1%">:</td>
                                <td>{{ $order->user->phone }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td style="width: 1%">:</td>
                                <td>{{ $order->user->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <!-- begin panel-body -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        @php
                            $orderStatusLabel['pending'] = 'label-secondary';
                            $orderStatusLabel['shipped'] = 'label-warning';
                            $orderStatusLabel['delivered'] = 'label-success';
                        @endphp
                        <table>
                            <tr>
                                <td>Date</td>
                                <td style="width: 1%">:</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <td>Payment Status</td>
                                <td style="width: 1%">:</td>
                                <td><span class="label {{ $order->payment_status == 'paid' ? 'label-success' : 'label-secondary' }} ">{{ $order->payment_status }}</span></td>
                            </tr>
                            <tr>
                                <td>Order Status</td>
                                <td style="width: 1%">:</td>
                                <td><span class="label {{ $orderStatusLabel[$order->order_status] }}">{{ $order->order_status }}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Detail ORDER-{{ $order->id }}</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th>#</th>
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
                                @foreach ($orderItems as $item)
                                <tr>
                                    <td>
                                        <div class="product-img">
                                            <img src="{{ asset('uploads/products') }}/{{ $item->product->image }}" alt="" style="width:120px" />
                                        </div>
                                    </td>
                                    <td class="cart-product">
                                        <div class="product-info">
                                            <div class="title">{{ $item->product->name }}</div>
                                        </div>
                                    </td>
                                    <td class="cart-price text-center">Rp. {{ number_format($item->product->sale_price, 2) }}</td>
                                    <td class="cart-qty text-center">
                                            {{ $item->qty }}
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
                                    <td class="text-right cart-summary" colspan="5">
                                        <div class="summary-container">
                                            <div class="summary-row">
                                                <div class="field">Order Subtotal</div>
                                                <div class="value value_total">Rp. {{ number_format($total, 2) }}</div>
                                            </div>
                                            <div class="summary-row text-danger">
                                                <div class="field">Free Shipping</div>
                                                <div class="value">Rp. 0.00</div>
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
                    </div>
                </div>
            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(function() {
            $('#image').on('change', function() {
                const img = $('#image');
                const [file] = this.files;

                if(file){
                    $('#image-prev img').attr('src', URL.createObjectURL(file));
                    $('#image-prev').show();
                }
            })

            // Fungsi untuk memvalidasi karakter
            function isCharacterValid(char) {
                // Regex untuk memeriksa karakter valid: huruf kecil, angka, dan tanda minus (-)
                const regex = /^[a-z0-9-]$/;
                return regex.test(char);
            }

            // Mencegah karakter tidak valid saat mengetik
            $('#slug').on('keypress', function (event) {
                const char = String.fromCharCode(event.which); // Karakter yang ditekan
                if (!isCharacterValid(char)) {
                    event.preventDefault(); // Mencegah input jika tidak valid
                }
            });

            // Mencegah input dari cara lain (copy-paste atau drag-drop)
            $('#slug').on('input', function () {
                // Hapus karakter tidak valid dari nilai input
                const validValue = $(this).val().replace(/[^a-z0-9-]/g, '');
                $(this).val(validValue);
            });
        })
    </script>
@endpush