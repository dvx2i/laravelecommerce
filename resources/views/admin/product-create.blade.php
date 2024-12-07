@extends('layouts.admin')

@section('content')
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
    <li class="breadcrumb-item active">Add Products</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Add Products</h1>
<!-- end page-header -->

<div class="row">
    <div class="col-xl-8 ui-sortable">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <!-- begin panel-heading -->
            <div class="panel-heading ui-sortable-handle">
                <h4 class="panel-title">Form Product</h4>
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
                        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3">Slug</label>
                                <div class="col-md-9">
                                    <input type="text" id="slug" name="slug" class="form-control m-b-5 @error('slug') is-invalid @enderror" placeholder="Enter Slug" value="{{ old('slug') }}">
                                    @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Category</label>
                                <div class="col-md-9">
                                    <select id="category_id" name="category_id" class="form-control m-b-5  @error('category_id') is-invalid @enderror">
                                        <option value="">Pilih</option>
                                        @foreach ($categories as $item)
                                            <option {{ old('category_id') == $item->id ? 'selected' : ''; }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Brand</label>
                                <div class="col-md-9">
                                    <select id="brand_id" name="brand_id" class="form-control m-b-5 @error('brand_id') is-invalid @enderror">
                                        <option value="">Pilih</option>
                                        @foreach ($brands as $item)
                                            <option {{ old('brand_id') == $item->id ? 'selected' : ''; }} value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Price</label>
                                <div class="col-md-9">
                                    <input type="text" id="price" name="price" class="form-control m-b-5 @error('price') is-invalid @enderror" placeholder="Enter Price" value="{{ old('price') }}">
                                    @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Sale (%)</label>
                                <div class="col-md-9">
                                    <input type="text" id="sale" name="sale" class="form-control m-b-5" placeholder="Enter Sale" value="{{ old('sale') }}">
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Sale Price</label>
                                <div class="col-md-9">
                                    <input type="text" id="sale_price" name="sale_price" class="form-control m-b-5" placeholder="Sale Price" value="{{ old('sale_price') }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Product Status</label>
                                <div class="col-md-9">
                                    <select id="product_status" name="product_status" class="form-control m-b-5">
                                        <option {{ old('product_status') == 'active' ? 'selected' : ''; }} value="active">Active</option>
                                        <option {{ old('product_status') == 'inactive' ? 'selected' : ''; }} value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Description 1</label>
                                <div class="col-md-9">
                                    <textarea type="text" id="description_1" name="description_1" class="form-control m-b-5" placeholder="Enter Description 1" >{{ old('description_1') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Description 2</label>
                                <div class="col-md-9">
                                    <textarea type="text" id="description_2" name="description_2" class="form-control m-b-5" placeholder="Enter Description 2">{{ old('description_2') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row m-b-15 d-none" id="image-prev">
                                <label class="col-form-label col-md-3">&nbsp;</label>
                                <div class="col-md-9">
                                   <img src="" alt="">
                                </div>
                            </div>
                            <div class="form-group row m-b-15">
                                <label class="col-form-label col-md-3">Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror">
                                    @error('image')
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
    <script>
        $(document).ready(function () {
            // Function to format input as decimal
            function formatDecimal(value) {
                return parseFloat(value.replace(/,/g, '')) || 0;
            }

            function formatRupiah(value) {
                // Pisahkan angka dan desimal jika ada
                let parts = value.split('.'); // Pisahkan angka sebelum dan sesudah titik
                let integerPart = parts[0].replace(/[^0-9]/g, ''); // Ambil hanya angka dari bagian integer
                
                // Tambahkan koma sebagai pembatas ribuan
                integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

                // Gabungkan kembali jika ada bagian desimal
                return parts.length > 1 ? `${integerPart}.${parts[1].replace(/[^0-9]/g, '')}` : integerPart;
            }
    
            // Function to calculate sale price
            function calculateSalePrice() {
                // Get price and sale percentage
                let price = formatDecimal($('#price').val());
                let sale = formatDecimal($('#sale').val());
    
                // Calculate sale price
                let salePrice = price - (sale / 100 * price);
    
                // Set sale price (formatted to 2 decimal places)
                $('#sale_price').val(formatRupiah(salePrice.toFixed(2)));
            }
    
            // Event listeners for price and sale input changes
            $('#price, #sale').on('input', function () {
                calculateSalePrice();
                const price = $('#price').val();
                const sale = $('#sale').val();

                // Update nilai input dengan format Rupiah
                const priceformatted = formatRupiah(price);
                $('#price').val(priceformatted);
                // Update nilai input dengan format Rupiah
                const saleformatted = formatRupiah(sale);
                $('#sale').val(saleformatted);
            });

            // Event ketika input kehilangan fokus (opsional, untuk validasi lebih lanjut)
            $('#price').on('blur', function () {
                const inputVal = $(this).val();

                // Pastikan nilai valid, jika kosong set ke 0
                if (!inputVal.match(/^\d+(\.\d{3})*(,\d+)?$/)) {
                    $(this).val('0');
                }
            });
        });
    </script>
@endpush