@extends('layouts.admin')

@push('styles')
	<link href="{{ asset('backend') }}/assets/plugins/x-editable-bs4/dist/bootstrap4-editable/css/bootstrap-editable.css" rel="stylesheet" />
	<link href="{{ asset('backend') }}/assets/plugins/x-editable-bs4/dist/inputs-ext/address/address.css" rel="stylesheet" />
	<link href="{{ asset('backend') }}/assets/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.css" rel="stylesheet" />
@endpush
@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
    <li class="breadcrumb-item active">Orders</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Orders</h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
    <div class="col-xl-8">
        @if(Session::has('status'))
            <div class="alert alert-success fade show m-b-10">
                <span class="close" data-dismiss="alert">×</span>
                {{ Session::get('status') }}
            </div>
        @endif
    </div>
    <div class="col-xl-8 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Orders Table </h4>
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
                <!-- begin table-responsive -->
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $orderStatusLabel['pending'] = 'label-secondary';
                                    $orderStatusLabel['shipped'] = 'label-warning';
                                    $orderStatusLabel['delivered'] = 'label-success';
                                @endphp
                                @foreach ($orders as $item)
                                <tr>
                                    <td class="text-center">ORDER-{{ $item->id }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>Rp. {{ number_format($item->total_price, 2) }}</td>
                                    <td><span class="label {{ $item->payment_status == 'paid' ? 'label-success' : 'label-secondary' }} ">{{ $item->payment_status }}</span></td>
                                    <td>
                                        {{-- <span class="label {{ $orderStatusLabel[$item->order_status] }}">{{ $item->order_status }}</span> --}}
                                        <a href="javascript:;" class="order_status" data-type="select" data-pk="{{ $item->id }}" data-value="{{ $item->order_status }}" data-title="Select Order Status">
                                    </td>
                                    <td class="with-btn" nowrap="">
                                        <div style="display: flex; gap: 8px;">
                                            <a href="{{ route('admin.order.show', ['order' => $item->id]) }}" class="btn btn-sm btn-secondary width-60 m-r-2">Details</a>
                                            <form method="POST" action="{{ route('admin.order.destroy', ['order' => $item->id]) }}" id="delete-order">
                                                @csrf 
                                                @method('DELETE')
                                                <a href="#" onclick="deleteOrder(event)" class="btn btn-sm btn-danger width-60">Delete</a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 flex item-center justify-between flex-wrap gap10">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                <!-- end table-responsive -->
            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>
</div>

@endsection

@push('scripts')

    <script src="{{ asset('backend') }}/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/x-editable-bs4/dist/bootstrap4-editable/js/bootstrap-editable.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/x-editable-bs4/dist/inputs-ext/address/address.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/lib/typeahead.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/x-editable-bs4/dist/inputs-ext/typeaheadjs/typeaheadjs.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/x-editable-bs4/dist/inputs-ext/wysihtml5/wysihtml5.js"></script>
    <script src="{{ asset('backend/assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script>
        function deleteOrder(e) {
            e.preventDefault();
            const form = $('#delete-order');

            swal({
			title: 'Are you sure?',
			text: 'You will not be able to recover this data!',
			icon: 'error',
			buttons: {
				cancel: {
					text: 'Cancel',
					value: null,
					visible: true,
					className: 'btn btn-default',
					closeModal: true,
				},
				confirm: {
					text: 'Delete',
					value: true,
					visible: true,
					className: 'btn btn-danger',
					closeModal: true
				}
			}
		}).then(function(result) {
            if(result){
                form.submit();
            }
        });
        }
        
    $(document).ready(function () {
        // Set up CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.order_status').editable({
            source: [
                { value: 'pending', text: 'pending' },
                { value: 'shipped', text: 'shipped' },
                { value: 'delivered', text: 'delivered' }
            ],
            display: function(value, sourceData) {
                var icons = {'pending': '<i class="fa fa-clock m-r-5"></i>', 'shipped': '<i class="fa fa-cube m-r-5"></i>', 'delivered': '<i class="fa fa-truck m-r-5"></i>' };
                var elem = $.grep(sourceData, function(o) { return o.value == value; });

                if (elem.length) {
                    $(this).text(elem[0].text).prepend(icons[value]);
                } else {
                    $(this).empty();
                }
            },
            url: '{{ route('admin.order.update') }}', // URL for your AJAX request
            type: 'POST', // HTTP method (e.g., POST, PUT)
            params: function(params) {
                // Customize parameters sent to the server if needed
                return {
                    orderId: params.pk, // Primary key of the record
                    orderStatus: params.value // New value of the editable field
                };
            },
            success: function(response, newValue) {
                // Handle successful update
                console.log('Update successful:', response);
            },
            error: function(xhr, status, error) {
                // Handle error during update
                console.error('Update failed:', error);
            }
        });
    });

    </script>
@endpush