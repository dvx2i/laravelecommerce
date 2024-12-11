@extends('layouts.admin')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
    <li class="breadcrumb-item active">Add Users</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Add Users</h1>
<!-- end page-header -->

<div class="row">
    <div class="col-xl-8 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Form User</h4>
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
                        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" name="name" class="form-control m-b-5 @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="text" id="email" name="email" class="form-control m-b-5 @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Phone</label>
                                <div class="col-md-9">
                                    <input type="text" id="phone" name="phone" class="form-control m-b-5 @error('phone') is-invalid @enderror" placeholder="Enter phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Address</label>
                                <div class="col-md-9">
                                    <input type="text" id="address" name="address" class="form-control m-b-5 @error('address') is-invalid @enderror" placeholder="Enter address" value="{{ old('address') }}">
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Post Code</label>
                                <div class="col-md-9">
                                    <input type="text" id="post_code" name="post_code" class="form-control m-b-5 @error('post_code') is-invalid @enderror" placeholder="Enter post_code" value="{{ old('post_code') }}">
                                    @error('post_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Role</label>
                                <div class="col-md-9">
                                    <select name="role" id="role" class="form-control m-b-5 @error('role') is-invalid @enderror">
                                        <option {{ old('role') == 'ADMIN' ? 'selected' : '' }} value="ADMIN">ADMIN</option>
                                        <option {{ old('role') == 'CUSTOMER' ? 'selected' : '' }} value="CUSTOMER">CUSTOMER</option>
                                    </select>
                                    @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="password" name="password" class="form-control m-b-5 @error('password') is-invalid @enderror" placeholder="Enter password" value="{{ old('password') }}">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save</button>
                                </div>
                            </div>
                        </form>
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