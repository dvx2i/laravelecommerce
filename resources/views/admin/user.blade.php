@extends('layouts.admin')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
    <li class="breadcrumb-item active">Users</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Users</h1>
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
                <h4 class="panel-title">Users Table </h4>
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
                        <a href="{{ route('admin.user.create') }}" class="btn btn-default m-r-5 pull-right"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Mail</th>
                                    <th>Role</th>
                                    <th width="1%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($users as $item)
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td class="with-btn" nowrap="">
                                        <div style="display: flex; gap: 8px;">
                                            <a href="{{ route('admin.user.edit', ['user' => $item->id]) }}" class="btn btn-sm btn-primary width-60 m-r-2">Edit</a>
                                            
                                            <form method="POST" action="{{ route('admin.user.destroy', ['user' => $item->id]) }}" id="delete-user">
                                                @csrf 
                                                @method('DELETE')
                                                <a href="#" onclick="deleteUser(event)" class="btn btn-sm btn-danger width-60">Delete</a>
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
                        {{ $users->links('pagination::bootstrap-5') }}
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
    <script src="{{ asset('backend/assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script>
        function deleteUser(e) {
            e.preventDefault();
            const form = $('#delete-user');

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
    </script>
@endpush