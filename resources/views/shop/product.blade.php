@extends('layouts.app')

@section('content')
    
    <!-- BEGIN #page-header -->
    <div id="page-header" class="section-container page-header-container bg-black">
        <!-- BEGIN page-header-cover -->
        <div class="page-header-cover">
            <img src="{{ asset('frontend/assets/img/cover/cover-12.jpg')}}" alt="" />
        </div>
        <!-- END page-header-cover -->
        <!-- BEGIN container -->
        <div class="container">
            <h1 class="page-header">Products</h1>
        </div>
        <!-- END container -->
    </div>
    <!-- BEGIN #page-header -->

    <!-- BEGIN search-results -->
    <div id="search-results" class="section-container">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN search-container -->
            <div class="search-container">
                <!-- BEGIN search-content -->
                <div class="search-content">
                    <!-- BEGIN search-item-container -->
                    <div class="search-item-container">
                        @foreach ($products->chunk(3) as $productRow)
                            <div class="item-row">
                                @foreach ($productRow as $product)
                                    <div class="item item-thumbnail">
                                        <a href="{{ route('shop.product.show', ['product_slug' => $product->slug]) }}" class="item-image">
                                            <img src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" />
                                            @if ($product->sale)
                                                <div class="discount">{{ $product->sale }}% OFF</div>
                                            @endif
                                        </a>
                                        <div class="item-info">
                                            <h4 class="item-title">
                                                <a href="{{ route('shop.product.show', ['product_slug' => $product->slug]) }}">
                                                    {{ $product->name }}<br />{{ Str::of($product->description_1)->words(3, '') }}
                                                </a>
                                            </h4>
                                            <div class="item-price">Rp. {{ number_format($product->sale_price, 2) }}</div>
                                            @if ($product->sale_price)
                                                <div class="item-discount-price">Rp. {{ number_format($product->price, 2) }}</div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach                            
                    </div>
                    <!-- END search-item-container -->
                    <!-- BEGIN pagination -->
                    {{-- <ul class="pagination justify-content-center m-t-0">
                        <li class="page-item disabled"><a href="javascript:;" class="page-link">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">5</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">Next</a></li>
                    </ul> --}}
                    {{ $products->links() }}
                    <!-- END pagination -->
                </div>
                <!-- END search-content -->
                <!-- BEGIN search-sidebar -->
                <div class="search-sidebar">
                    <h4 class="title">Filter By</h4>
                    <form action="product.html" method="POST" name="filter_form">
                        <div class="form-group">
                            <label class="control-label">Keywords</label>
                            <input type="text" class="form-control input-sm" name="keyword" value="Mobile Phones" placeholder="Enter Keywords" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Price</label>
                            <div class="row row-space-0">
                                <div class="col-md-5">
                                    <input type="number" class="form-control input-sm" name="price_from" value="10" placeholder="Price From" />
                                </div>
                                <div class="col-md-2 text-center p-t-5 f-s-12 text-muted">to</div>
                                <div class="col-md-5">
                                    <input type="number" class="form-control input-sm" name="price_to" value="10000" placeholder="Price To" />
                                </div>
                            </div>
                        </div>
                        <div class="m-b-30">
                            <button type="submit" class="btn btn-sm btn-theme btn-inverse"><i class="fa fa-search fa-fw mr-1 ml-n3"></i> FILTER</button>
                        </div>
                    </form>
                    <h4 class="title m-b-0">Categories</h4>
                    <ul class="search-category-list">
                        @foreach ($categories as $item)
                        <li><a href="#">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- END search-sidebar -->
            </div>
            <!-- END search-container -->
        </div>
        <!-- END container -->
    </div>
    <!-- END search-results -->
@endsection