@extends('layouts.admin')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
    <li class="breadcrumb-item active">Products</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Products</h1>
<!-- end page-header -->
<!-- begin row -->
<div class="row">
    <div class="col-xl-12">
        @if(Session::has('status'))
            <div class="alert alert-success fade show m-b-10">
                <span class="close" data-dismiss="alert">×</span>
                {{ Session::get('status') }}
            </div>
        @endif
    </div>
    <div class="col-xl-12 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Products Table </h4>
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
                        <a href="{{ route('admin.product.create') }}" class="btn btn-default m-r-5 pull-right"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Stocks</th>
                                    <th>Product Status</th>
                                    <th width="1%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td class="with-img">
                                        <img src="{{ asset('uploads/products') }}/{{ $item->image }}" alt="{{ $item->name }}" class="img-rounded height-30">
                                    </td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->brand->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->sale }} %</td>
                                    <td> <a href="javascript:;" class="product_stock" data-type="number" data-pk="{{ $item->id }}" data-value="{{ $item->stocks }}" data-title="Stocks"></td>
                                    <td>
                                        {{-- <span class="badge {{ $item->product_status == 'active' ? 'badge-success' : 'badge-secondary' }}">{{ $item->product_status }}</span> --}}
                                        <a href="javascript:;" class="product_status" data-type="select" data-pk="{{ $item->id }}" data-value="{{ $item->product_status }}" data-title="Select Product Status">
                                    </td>
                                    <td class="with-btn" nowrap="">
                                        <div style="display: flex; gap: 8px;">
                                            <a href="{{ route('admin.product.edit', ['product' => $item->id]) }}" class="btn btn-sm btn-primary width-60 m-r-2">Edit</a>
                                            
                                            <form method="POST" action="{{ route('admin.product.destroy', ['product' => $item->id]) }}" id="delete-product">
                                                @csrf 
                                                @method('DELETE')
                                                <a href="#" onclick="deleteProduct(event)" class="btn btn-sm btn-danger width-60">Delete</a>
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
                        {{ $products->links('pagination::bootstrap-5') }}
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
    <script src="{{ asset('backend/assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script>
        function deleteProduct(e) {
            e.preventDefault();
            const form = $('#delete-product');

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

        $('.product_status').editable({
            source: [
                { value: 'active', text: 'active' },
                { value: 'inactive', text: 'inactive' },
            ],
            display: function(value, sourceData) {
                var icons = {'active': '<i class="fa fa-check m-r-5"></i>', 'inactive': '<i class="fa fa-times m-r-5"></i>' };
                var elem = $.grep(sourceData, function(o) { return o.value == value; });

                if (elem.length) {
                    $(this).text(elem[0].text).prepend(icons[value]);
                } else {
                    $(this).empty();
                }
            },
            url: '{{ route('admin.product.update_status') }}', // URL for your AJAX request
            type: 'POST', // HTTP method (e.g., POST, PUT)
            params: function(params) {
                // Customize parameters sent to the server if needed
                return {
                    productId: params.pk, // Primary key of the record
                    productStatus: params.value // New value of the editable field
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

        $('.product_stock').editable({
            validate: function(value) {
                if($.trim(value) === '') { 
                    return 'This field is requiCOLOR_RED';
                }
            },
            url: '{{ route('admin.product.update_stock') }}', // URL for your AJAX request
            type: 'POST', // HTTP method (e.g., POST, PUT)
            params: function(params) {
                // Customize parameters sent to the server if needed
                return {
                    productId: params.pk, // Primary key of the record
                    productStock: params.value // New value of the editable field
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