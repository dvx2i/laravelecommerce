@extends('layouts.app')
@push('styles')
<link href="{{ asset('backend') }}/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
@endpush
@section('content')
    <!-- BEGIN #product -->
    <div id="product" class="section-container p-t-20">
        <!-- BEGIN container -->
        <div class="container">				
            <!-- BEGIN product -->
            <div class="product">
                <!-- BEGIN product-detail -->
                <div class="product-detail">
                    <!-- BEGIN product-image -->
                    <div class="product-image">
                        <!-- BEGIN product-thumbnail -->
                        <div class="product-thumbnail">
                            <ul class="product-thumbnail-list">
                                @if ($product->images)
                                    @php
                                        $images = explode(",", $product->images );
                                    @endphp
                                        <li class="active"><a href="#" data-click="show-main-image" data-url="{{ asset('uploads/products/'.$product->image) }}"><img src="{{ asset('uploads/products/'.$product->image) }}" alt="" /></a></li>
                                    @foreach ($images as $key => $item)
                                        <li><a href="#" data-click="show-main-image" data-url="{{ asset('uploads/products') }}/{{ $item }}"><img src="{{ asset('uploads/products') }}/{{ $item }}" alt="" /></a></li>
                                    @endforeach
                                @else
                                <li class="active"><a href="#" data-click="show-main-image" data-url="{{ asset('uploads/products/'.$product->image) }}"><img src="{{ asset('uploads/products/'.$product->image) }}" alt="" /></a></li>
                                @endif
                            </ul>
                        </div>
                        <!-- END product-thumbnail -->
                        <!-- BEGIN product-main-image -->
                        <div class="product-main-image" data-id="main-image">
                            <img src="{{ asset('uploads/products/'.$product->image) }}" alt="" />
                        </div>
                        <!-- END product-main-image -->
                    </div>
                    <!-- END product-image -->
                    <!-- BEGIN product-info -->
                    <div class="product-info">
                        <!-- BEGIN product-info-header -->
                        <div class="product-info-header">
                            <h1 class="product-title">
                                @if ($product->sale)
                                <span class="badge bg-primary">{{ $product->sale }}% OFF</span>
                                @endif 
                                {{ $product->name }} </h1>
                            <ul class="product-category">
                                <li><a href="#">iPhone</a></li>
                                <li>/</li>
                                <li><a href="#">mobile phone</a></li>
                                <li>/</li>
                                <li><a href="#">electronics</a></li>
                                <li>/</li>
                                <li><a href="#">lifestyle</a></li>
                            </ul>
                        </div>
                        <!-- END product-info-header -->
                        <!-- BEGIN product-warranty -->
                        <div class="product-warranty">
                            <div class="pull-right">Availability: {{ $product->stocks > 0 ?  'In stock' : 'Out of stock' }}</div>
                            <div><b>1 Year</b> Local Manufacturer Warranty</div>
                        </div>
                        <!-- END product-warranty -->
                        <!-- BEGIN product-info-list -->
                        {{ $product->description_1 }}
                        <!-- END product-info-list -->
                        <!-- BEGIN product-social -->
                        <div class="product-social mt-3">
                            <ul>
                                <li><a href="javascript:;" class="facebook" data-toggle="tooltip" data-trigger="hover" data-title="Facebook" data-placement="top"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="javascript:;" class="twitter" data-toggle="tooltip" data-trigger="hover" data-title="Twitter" data-placement="top"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:;" class="google-plus" data-toggle="tooltip" data-trigger="hover" data-title="Google Plus" data-placement="top"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="javascript:;" class="whatsapp" data-toggle="tooltip" data-trigger="hover" data-title="Whatsapp" data-placement="top"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a href="javascript:;" class="tumblr" data-toggle="tooltip" data-trigger="hover" data-title="Tumblr" data-placement="top"><i class="fab fa-tumblr"></i></a></li>
                            </ul>
                        </div>
                        <!-- END product-social -->
                        <!-- BEGIN product-purchase-container -->
                        <div class="product-purchase-container">
                            @if ($product->sale)
                            <div class="product-discount">
                                <span class="discount">Rp. {{ number_format($product->price, 2) }}</span>
                            </div>
                            @endif
                            <div class="product-price">
                                <div class="price">Rp. {{ number_format($product->sale_price, 2) }}</div>
                            </div>
                            <button type="button" class="btn {{ $product->stocks > 0 ? 'btn-inverse' : 'btn-grey' }}  btn-theme btn-lg width-200" id="addToCart" data-product-id="{{ $product->id }}">ADD TO CART</button>
                        </div>
                        <!-- END product-purchase-container -->
                    </div>
                    <!-- END product-info -->
                </div>
                <!-- END product-detail -->
                <!-- BEGIN product-tab -->
                <div class="product-tab">
                    <!-- BEGIN #product-tab -->
                    <ul id="product-tab" class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#product-desc" data-toggle="tab">Product Description</a></li>
                        <li class="nav-item"><a class="nav-link" href="#product-reviews" data-toggle="tab">Rating & Reviews (5)</a></li>
                    </ul>
                    <!-- END #product-tab -->
                    <!-- BEGIN #product-tab-content -->
                    <div id="product-tab-content" class="tab-content">
                        <!-- BEGIN #product-desc -->
                        <div class="tab-pane fade active show" id="product-desc">
                            <!-- BEGIN product-desc -->
                            <div class="product-desc">
                                <div class="image">
                                    <img src="{{ asset('uploads/products/'.$product->image) }}" alt="" />
                                </div>
                                <div class="desc">
                                    <h4>{{ $product->name }}</h4>
                                    <p>
                                        {{ $product->description_2 }}
                                    </p>
                                </div>
                            </div>
                            <!-- END product-desc -->
                        </div>
                        <!-- END #product-desc -->
                        <!-- BEGIN #product-reviews -->
                        <div class="tab-pane fade" id="product-reviews">
                            <!-- BEGIN row -->
                            <div class="row row-space-30">
                                <!-- BEGIN col-7 -->
                                <div class="col-md-7 mb-4 mb-lg-0">
                                    <!-- BEGIN review -->
                                    <div class="review">
                                        <div class="review-info">
                                            <div class="review-icon"><img src="{{ asset('frontend/assets/img/user/user-1.jpg') }}" alt="" /></div>
                                            <div class="review-rate">
                                                <ul class="review-star">
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class=""><i class="far fa-star"></i></li>
                                                </ul>
                                                (4/5)
                                            </div>
                                            <div class="review-name">Terry</div>
                                            <div class="review-date">24/05/2016 7:40am</div>
                                        </div>
                                        <div class="review-title">
                                            What does “SIM-free” mean?
                                        </div>
                                        <div class="review-message">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in imperdiet augue. Integer non aliquam eros. Cras vehicula nec sapien pretium sagittis. Pellentesque feugiat lectus non malesuada aliquam. Etiam id tortor pretium, dictum leo at, malesuada tortor.
                                        </div>
                                    </div>
                                    <!-- END review -->
                                    <!-- BEGIN review -->
                                    <div class="review">
                                        <div class="review-info">
                                            <div class="review-icon"><img src="{{ asset('frontend/assets/img/user/user-2.jpg') }}" alt="" /></div>
                                            <div class="review-rate">
                                                <ul class="review-star">
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class=""><i class="far fa-star"></i></li>
                                                    <li class=""><i class="far fa-star"></i></li>
                                                </ul>
                                                (3/5)
                                            </div>
                                            <div class="review-name">George</div>
                                            <div class="review-date">24/05/2016 8:40am</div>
                                        </div>
                                        <div class="review-title">
                                            When I buy iPhone from apple.com, is it tied to a carrier or does it come “unlocked”?
                                        </div>
                                        <div class="review-message">
                                            In mauris leo, maximus at pellentesque vel, pharetra vel risus. Aenean in semper velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi volutpat mattis neque, at molestie tellus ultricies quis. Ut lobortis odio nec nunc ullamcorper, vitae faucibus augue semper. Sed luctus lobortis nulla ac volutpat. Mauris blandit scelerisque sem.
                                        </div>
                                    </div>
                                    <!-- END review -->
                                    <!-- BEGIN review -->
                                    <div class="review">
                                        <div class="review-info">
                                            <div class="review-icon"><img src="{{ asset('frontend/assets/img/user/user-3.jpg') }}" alt="" /></div>
                                            <div class="review-rate">
                                                <ul class="review-star">
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                </ul>
                                                (5/5)
                                            </div>
                                            <div class="review-name">Steve</div>
                                            <div class="review-date">23/05/2016 8:40am</div>
                                        </div>
                                        <div class="review-title">
                                            Where is the iPhone Upgrade Program available?
                                        </div>
                                        <div class="review-message">
                                            Duis ut nunc sem. Integer efficitur, justo sit amet feugiat hendrerit, arcu nisl elementum dui, in ultricies erat quam at mauris. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec nec ultrices tellus. Mauris elementum venenatis volutpat.
                                        </div>
                                    </div>
                                    <!-- END review -->
                                    <!-- BEGIN review -->
                                    <div class="review">
                                        <div class="review-info">
                                            <div class="review-icon"><img src="{{ asset('frontend/assets/img/user/user-4.jpg') }}" alt="" /></div>
                                            <div class="review-rate">
                                                <ul class="review-star">
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class=""><i class="far fa-star"></i></li>
                                                    <li class=""><i class="far fa-star"></i></li>
                                                    <li class=""><i class="far fa-star"></i></li>
                                                </ul>
                                                (2/5)
                                            </div>
                                            <div class="review-name">Alfred</div>
                                            <div class="review-date">23/05/2016 10.02am</div>
                                        </div>
                                        <div class="review-title">
                                            Can I keep my current service plan if I choose the iPhone Upgrade Program?
                                        </div>
                                        <div class="review-message">
                                            Donec vel fermentum quam. Vivamus scelerisque enim eget tristique auctor. Vivamus tempus, turpis iaculis tempus egestas, leo augue hendrerit tellus, et efficitur neque massa at neque. Aenean efficitur eleifend orci at ornare.
                                        </div>
                                    </div>
                                    <!-- END review -->
                                    <!-- BEGIN review -->
                                    <div class="review">
                                        <div class="review-info">
                                            <div class="review-icon"><img src="{{ asset('frontend/assets/img/user/user-5.jpg') }}" alt="" /></div>
                                            <div class="review-rate">
                                                <ul class="review-star">
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                </ul>
                                                (5/5)
                                            </div>
                                            <div class="review-name">Edward</div>
                                            <div class="review-date">22/05/2016 9.30pm</div>
                                        </div>
                                        <div class="review-title">
                                            I have an existing carrier contract or installment plan. Can I purchase with the iPhone Upgrade Program
                                        </div>
                                        <div class="review-message">
                                            Aliquam consequat ut turpis non interdum. Integer blandit erat nec sapien sollicitudin, a fermentum dui venenatis. Nullam consequat at enim et aliquet. Cras mattis turpis quis eros volutpat tristique vel a ligula. Proin aliquet leo mi, et euismod metus placerat sit amet.
                                        </div>
                                    </div>
                                    <!-- END review -->
                                </div>
                                <!-- END col-7 -->
                                <!-- BEGIN col-5 -->
                                <div class="col-md-5">
                                    <!-- BEGIN review-form -->
                                    <div class="review-form">
                                        <form action="product_detail.html" name="review_form" method="POST">
                                            <h2>Write a review</h2>
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" />
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="email" />
                                            </div>
                                            <div class="form-group">
                                                <label for="review">Review <span class="text-danger">*</span></label>
                                                <textarea class="form-control" rows="8" id="review"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Rating  <span class="text-danger">*</span></label>
                                                <div class="rating rating-selection" data-rating="true" data-target="rating">
                                                    <i class="far fa-star" data-value="2"></i>
                                                    <i class="far fa-star" data-value="4"></i>
                                                    <i class="far fa-star" data-value="6"></i>
                                                    <i class="far fa-star" data-value="8"></i>
                                                    <i class="far fa-star" data-value="10"></i>
                                                    <span class="rating-comment">
                                                        <span class="rating-comment-tooltip">Click to rate</span>
                                                    </span>
                                                </div>
                                                <select name="rating" class="hide">
                                                    <option value="2">2</option>
                                                    <option value="4">4</option>
                                                    <option value="6">6</option>
                                                    <option value="8">8</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-inverse btn-theme btn-lg">Submit Review</button>
                                        </form>
                                    </div>
                                    <!-- END review-form --> 
                                </div>
                                <!-- END col-5 -->
                            </div>
                            <!-- END row -->
                        </div>
                        <!-- END #product-reviews -->
                    </div>
                    <!-- END #product-tab-content -->
                </div>
                <!-- END product-tab -->
            </div>
            <!-- END product -->
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('backend') }}/assets/plugins/gritter/js/jquery.gritter.js"></script>
<script>
    $(document).ready(function () {
        // Set up CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addToCart').on('click', function () {
            // Get the product ID from the button's data attribute
            let productId = $(this).data('product-id');

            // Make the AJAX POST request
            $.ajax({
                url: '{{ route("shop.cart.store") }}', // Your route here
                method: 'POST',
                data: { product_id: productId }, // Send product_id
                success: function (response) {
                    if(response.status == 'error'){
                        $.gritter.add({
                            title: 'Something went wrong!',
                            text: response.message,
			                class_name: 'gritter-dark'
                        });
                        return false;
                    }
                    if(response.status == 'success'){
                        $.gritter.add({
                            title: 'Success!',
                            text: response.message,
			                class_name: 'gritter-success'
                        });
                        $('#total_cart').html(response.qty)
                        return false;
                    }
                },
                error: function (xhr) {
                    $('#responseMessage').html('<p style="color: red;">Error: ' + xhr.responseText + '</p>');
                }
            });
        });
    });
</script>
@endpush