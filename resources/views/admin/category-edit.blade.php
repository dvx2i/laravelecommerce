@extends('layouts.admin')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
    <li class="breadcrumb-item active">Edit Categories</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Categories</h1>
<!-- end page-header -->

<div class="row">
    <div class="col-xl-8 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Form Brand </h4>
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
                        <form action="{{ route('admin.category.update', ['category' => $category->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="name" name="name" class="form-control m-b-5 @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ $category->name }}">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Slug</label>
                                <div class="col-md-9">
                                    <input type="text" id="slug" name="slug" class="form-control m-b-5 @error('slug') is-invalid @enderror" placeholder="Enter Slug" value="{{ $category->slug }}">
                                    @error('slug')
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