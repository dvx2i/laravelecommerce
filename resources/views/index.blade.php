@extends('layouts.app')

@section('content')
    <!-- BEGIN #slider -->
    <div id="slider" class="section-container p-0 bg-black-darker">
        <!-- BEGIN carousel -->
        <div id="main-carousel" class="carousel slide" data-ride="carousel">
            <!-- BEGIN carousel-inner -->
            <div class="carousel-inner">
                <!-- BEGIN item -->
                <div class="carousel-item active" data-paroller="true" data-paroller-factor="0.3" data-paroller-factor-sm="0.01" data-paroller-factor-xs="0.01" style="background: url({{ asset('frontend/assets/img/slider/slider-1-cover.jpg') }}) center 0 / cover no-repeat;">
                    <div class="container">
                        <img src="{{ asset('frontend/assets/img/slider/slider-1-product.png') }}" class="product-img right bottom fadeInRight animated" alt="" />
                    </div>
                    <div class="carousel-caption carousel-caption-left">
                        <div class="container">
                            <h3 class="title m-b-5 fadeInLeftBig animated">iMac</h3>
                            <p class="m-b-15 fadeInLeftBig animated">The vision is brighter than ever.</p>
                            <div class="price m-b-30 fadeInLeftBig animated"><small>from</small> <span>$2299.00</span></div>
                            <a href="product_detail.html" class="btn btn-outline btn-lg fadeInLeftBig animated">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- END item -->
                <!-- BEGIN item -->
                <div class="carousel-item" data-paroller="true" data-paroller-factor="-0.3" data-paroller-factor-sm="0.01" data-paroller-factor-xs="0.01" style="background: url({{ asset('frontend/assets/img/slider/slider-2-cover.jpg') }}) center 0 / cover no-repeat;">
                    <div class="container">
                        <img src="{{ asset('frontend/assets/img/slider/slider-2-product.png') }}" class="product-img left bottom fadeInLeft animated" alt="" />
                    </div>
                    <div class="carousel-caption carousel-caption-right">
                        <div class="container">
                            <h3 class="title m-b-5 fadeInRightBig animated">iPhone X</h3>
                            <p class="m-b-15 fadeInRightBig animated">Say hello to the future.</p>
                            <div class="price m-b-30 fadeInRightBig animated"><small>from</small> <span>$1,149.00</span></div>
                            <a href="product_detail.html" class="btn btn-outline btn-lg fadeInRightBig animated">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- END item -->
                <!-- BEGIN item -->
                <div class="carousel-item" data-paroller="true" data-paroller-factor="-0.3" data-paroller-factor-sm="0.01" data-paroller-factor-xs="0.01" style="background: url({{ asset('frontend/assets/img/slider/slider-3-cover.jpg') }}) center 0 / cover no-repeat;">
                    <div class="carousel-caption">
                        <div class="container">
                            <h3 class="title m-b-5 fadeInDownBig animated">Macbook Air</h3>
                            <p class="m-b-15 fadeInDownBig animated">Thin.Light.Powerful.<br />And ready for anything</p>
                            <div class="price fadeInDownBig animated"><small>from</small> <span>$999.00</span></div>
                            <a href="product_detail.html" class="btn btn-outline btn-lg fadeInUpBig animated">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- END item -->
            </div>
            <!-- END carousel-inner -->
            <a class="carousel-control-prev" href="#main-carousel" data-slide="prev"> 
            <i class="fa fa-angle-left"></i> 
            </a>
            <a class="carousel-control-next" href="#main-carousel" data-slide="next"> 
            <i class="fa fa-angle-right"></i> 
            </a>
        </div>
        <!-- END carousel -->
    </div>
    <!-- END #slider -->
    
    <!-- BEGIN #promotions -->
    <div id="promotions" class="section-container bg-white">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN section-title -->
            <h4 class="section-title clearfix">
                <a href="#" class="pull-right">SHOW ALL</a>
                Exclusive promotions
                <small>from 25 September 2016 - 1 January 2017</small>
            </h4>
            <!-- END section-title -->
            <!-- BEGIN row -->
            <div class="row row-space-10">
                <!-- BEGIN col-6 -->
                <div class="col-lg-6">
                    <!-- BEGIN promotion -->
                    <div class="promotion promotion-lg bg-black-darker">
                        <div class="promotion-image text-right promotion-image-overflow-bottom">
                            <img src="{{ asset('frontend/assets/img/product/product-iphone-se.png') }}" alt="" />
                        </div>
                        <div class="promotion-caption promotion-caption-inverse">
                            <h4 class="promotion-title">iPhone SE</h4>
                            <div class="promotion-price"><small>from</small> $299.00</div>
                            <p class="promotion-desc">A big step for small.<br />A beloved design. Now with more to love.</p>
                            <a href="#" class="promotion-btn">View More</a>
                        </div>
                    </div>
                    <!-- END promotion -->
                </div>
                <!-- END col-6 -->
                <!-- BEGIN col-3 -->
                <div class="col-lg-3 col-md-6">
                    <!-- BEGIN promotion -->
                    <div class="promotion bg-blue">
                        <div class="promotion-image promotion-image-overflow-bottom promotion-image-overflow-top">
                            <img src="{{ asset('frontend/assets/img/product/product-apple-watch-sm.png') }}" alt="" />
                        </div>
                        <div class="promotion-caption promotion-caption-inverse text-right">
                            <h4 class="promotion-title">Apple Watch</h4>
                            <div class="promotion-price"><small>from</small> $299.00</div>
                            <p class="promotion-desc">You. At a glance.</p>
                            <a href="#" class="promotion-btn">View More</a>
                        </div>
                    </div>
                    <!-- END promotion -->
                    <!-- BEGIN promotion -->
                    <div class="promotion bg-silver-lighter">
                        <div class="promotion-image text-center promotion-image-overflow-bottom">
                            <img src="{{ asset('frontend/assets/img/product/product-mac-mini.png') }}" alt="" />
                        </div>
                        <div class="promotion-caption text-center">
                            <h4 class="promotion-title">Mac Mini</h4>
                            <div class="promotion-price"><small>from</small> $199.00</div>
                            <p class="promotion-desc">It’s mini in a massive way.</p>
                            <a href="#" class="promotion-btn">View More</a>
                        </div>
                    </div>
                    <!-- END promotion -->
                </div>
                <!-- END col-3 -->
                <!-- BEGIN col-3 -->
                <div class="col-lg-3 col-md-6">
                    <!-- BEGIN promotion -->
                    <div class="promotion bg-silver-lighter">
                        <div class="promotion-image promotion-image-overflow-right promotion-image-overflow-bottom text-right">
                            <img src="{{ asset('frontend/assets/img/product/product-mac-accessories.png') }}" alt="" />
                        </div>
                        <div class="promotion-caption text-center">
                            <h4 class="promotion-title">Apple Accessories</h4>
                            <div class="promotion-price"><small>from</small> $99.00</div>
                            <p class="promotion-desc">Redesigned. Rechargeable. Remarkable.</p>
                            <a href="#" class="promotion-btn">View More</a>
                        </div>
                    </div>
                    <!-- END promotion -->
                    <!-- BEGIN promotion -->
                    <div class="promotion bg-black">
                        <div class="promotion-image text-right">
                            <img src="{{ asset('frontend/assets/img/product/product-mac-pro.png') }}" alt="" />
                        </div>
                        <div class="promotion-caption promotion-caption-inverse">
                            <h4 class="promotion-title">Mac Pro</h4>
                            <div class="promotion-price"><small>from</small> $1,299.00</div>
                            <p class="promotion-desc">Built for creativity on an epic scale.</p>
                            <a href="#" class="promotion-btn">View More</a>
                        </div>
                    </div>
                    <!-- END promotion -->
                </div>
                <!-- END col-3 -->
            </div>
            <!-- END row -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #promotions -->
    
    <!-- BEGIN #trending-items -->
    <div id="trending-items" class="section-container">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN section-title -->
            <h4 class="section-title clearfix">
                <a href="#" class="pull-right m-l-5"><i class="fa fa-angle-right f-s-18"></i></a>
                <a href="#" class="pull-right"><i class="fa fa-angle-left f-s-18"></i></a>
                Trending Items
                <small>Shop and get your favourite items at amazing prices!</small>
            </h4>
            <!-- END section-title -->
            <!-- BEGIN row -->
            <div class="row row-space-10">
                <!-- BEGIN col-2 -->
                <div class="col-lg-2 col-md-4">
                    <!-- BEGIN item -->
                    <div class="item item-thumbnail">
                        <a href="product_detail.html" class="item-image">
                            <img src="{{ asset('frontend/assets/img/product/product-iphone.png') }}" alt="" />
                            <div class="discount">15% OFF</div>
                        </a>
                        <div class="item-info">
                            <h4 class="item-title">
                                <a href="product_detail.html">iPhone 6s Plus<br />16GB</a>
                            </h4>
                            <p class="item-desc">3D Touch. 12MP photos. 4K video.</p>
                            <div class="item-price">$649.00</div>
                            <div class="item-discount-price">$739.00</div>
                        </div>
                    </div>
                    <!-- END item -->
                </div>
                <!-- END col-2 -->
                <!-- BEGIN col-2 -->
                <div class="col-lg-2 col-md-4">
                    <!-- BEGIN item -->
                    <div class="item item-thumbnail">
                        <a href="product_detail.html" class="item-image">
                            <img src="{{ asset('frontend/assets/img/product/product-ipad-pro.png') }}" alt=""  />
                            <div class="discount">32% OFF</div>
                        </a>
                        <div class="item-info">
                            <h4 class="item-title">
                                <a href="product.html">9.7-inch iPad Pro<br />32GB</a>
                            </h4>
                            <p class="item-desc">Super. Computer. Now in two sizes.</p>
                            <div class="item-price">$599.00</div>
                            <div class="item-discount-price">$799.00</div>
                        </div>
                    </div>
                    <!-- END item -->
                </div>
                <!-- END col-2 -->
                <!-- BEGIN col-2 -->
                <div class="col-lg-2 col-md-4">
                    <!-- BEGIN item -->
                    <div class="item item-thumbnail">
                        <a href="product_detail.html" class="item-image">
                            <img src="{{ asset('frontend/assets/img/product/product-imac.png') }}" alt="" />
                            <div class="discount">20% OFF</div>
                        </a>
                        <div class="item-info">
                            <h4 class="item-title">
                                <a href="product.html">21.5-inch iMac<br />with Retina Display</a>
                            </h4>
                            <p class="item-desc">Retina. Now in colossal and ginormous.</p>
                            <div class="item-price">$1,099.00</div>
                            <div class="item-discount-price">$1,299.00</div>
                        </div>
                    </div>
                    <!-- END item -->
                </div>
                <!-- END col-2 -->
                <!-- BEGIN col-2 -->
                <div class="col-lg-2 col-md-4">
                    <!-- BEGIN item -->
                    <div class="item item-thumbnail">
                        <a href="product_detail.html" class="item-image">
                            <img src="{{ asset('frontend/assets/img/product/product-apple-watch.png') }}" alt="" />
                            <div class="discount">13% OFF</div>
                        </a>
                        <div class="item-info">
                            <h4 class="item-title">
                                <a href="product.html">Apple Watch<br />Stainless steel cases</a>
                            </h4>
                            <p class="item-desc">You. At a glance.</p>
                            <div class="item-price">$599.00</div>
                            <div class="item-discount-price">$799.00</div>
                        </div>
                    </div>
                    <!-- END item -->
                </div>
                <!-- END col-2 -->
                <!-- BEGIN col-2 -->
                <div class="col-lg-2 col-md-4">
                    <!-- BEGIN item -->
                    <div class="item item-thumbnail">
                        <a href="product_detail.html" class="item-image">
                            <img src="{{ asset('frontend/assets/img/product/product-macbook-pro.png') }}" alt="" />
                            <div class="discount">30% OFF</div>
                        </a>
                        <div class="item-info">
                            <h4 class="item-title">
                                <a href="product.html">MacBook Pro<br />with Retina Display</a>
                            </h4>
                            <p class="item-desc">Stunning Retina Display</p>
                            <div class="item-price">$1299.00</div>
                            <div class="item-discount-price">$1499.00</div>
                        </div>
                    </div>
                    <!-- END item -->
                </div>
                <!-- END col-2 -->
                <!-- BEGIN col-2 -->
                <div class="col-lg-2 col-md-4">
                    <!-- BEGIN item -->
                    <div class="item item-thumbnail">
                        <a href="product_detail.html" class="item-image">
                            <img src="{{ asset('frontend/assets/img/product/product-apple-tv.png') }}" alt="" />
                            <div class="discount">40% OFF</div>
                        </a>
                        <div class="item-info">
                            <h4 class="item-title">
                                <a href="product.html">Apple Tv<br />32GB</a>
                            </h4>
                            <p class="item-desc">The future of television is here.</p>
                            <div class="item-price">$149.00</div>
                            <div class="item-discount-price">$249.00</div>
                        </div>
                    </div>
                    <!-- END item -->
                </div>
                <!-- END col-2 -->
            </div>
            <!-- END row -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #trending-items -->
    
    <!-- BEGIN #mobile-list -->
    <div id="mobile-list" class="section-container p-t-0">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN section-title -->
            <h4 class="section-title clearfix">
                <a href="#" class="pull-right">SHOW ALL</a>
                Mobile Phones
                <small>Shop and get your favourite phone at amazing prices!</small>
            </h4>
            <!-- END section-title -->
            <!-- BEGIN category-container -->
            <div class="category-container">
                <!-- BEGIN category-sidebar -->
                <div class="category-sidebar">
                    <ul class="category-list">
                        <li class="list-header">Top Categories</li>
                        <li><a href="#">Microsoft</a></li>
                        <li><a href="#">Samsung</a></li>
                        <li><a href="#">Apple</a></li>
                        <li><a href="#">Micromax</a></li>
                        <li><a href="#">Karbonn</a></li>
                        <li><a href="#">Intex</a></li>
                        <li><a href="#">Sony</a></li>
                        <li><a href="#">HTC</a></li>
                        <li><a href="#">Asus</a></li>
                        <li><a href="#">Nokia</a></li>
                        <li><a href="#">Blackberry</a></li>
                        <li><a href="#">All Brands</a></li>
                    </ul>
                </div>
                <!-- END category-sidebar -->
                <!-- BEGIN category-detail -->
                <div class="category-detail">
                    <!-- BEGIN category-item -->
                    <a href="#" class="category-item full">
                        <div class="item">
                            <div class="item-cover">
                                <img src="{{ asset('frontend/assets/img/product/product-samsung-s7-edge.jpg') }}" alt="" />
                            </div>
                            <div class="item-info bottom">
                                <h4 class="item-title">Samsung Galaxy s7 Edge + Geat 360 + Gear VR</h4>
                                <p class="item-desc">Redefine what a phone can do</p>
                                <div class="item-price">$799.00</div>
                            </div>
                        </div>
                    </a>
                    <!-- END category-item -->
                    <!-- BEGIN category-item -->
                    <div class="category-item list">
                        <!-- BEGIN item-row -->
                        <div class="item-row">
                            <!-- BEGIN item -->
                            <div class="item item-thumbnail">
                                <a href="product_detail.html" class="item-image">
                                    <img src="{{ asset('frontend/assets/img/product/product-iphone.png') }}" alt="" />
                                    <div class="discount">15% OFF</div>
                                </a>
                                <div class="item-info">
                                    <h4 class="item-title">
                                        <a href="product_detail.html">iPhone 6s Plus<br />16GB</a>
                                    </h4>
                                    <p class="item-desc">3D Touch. 12MP photos. 4K video.</p>
                                    <div class="item-price">$649.00</div>
                                    <div class="item-discount-price">$739.00</div>
                                </div>
                            </div>
                            <!-- END item -->
                            <!-- BEGIN item -->
                            <div class="item item-thumbnail">
                                <a href="product_detail.html" class="item-image">
                                    <img src="{{ asset('frontend/assets/img/product/product-samsung-note5.png') }}" alt="" />
                                    <div class="discount">32% OFF</div>
                                </a>
                                <div class="item-info">
                                    <h4 class="item-title">
                                        <a href="product.html">Samsung Galaxy Note 5<br />Black</a>
                                    </h4>
                                    <p class="item-desc">Super. Computer. Now in two sizes.</p>
                                    <div class="item-price">$599.00</div>
                                    <div class="item-discount-price">$799.00</div>
                                </div>
                            </div>
                            <!-- END item -->
                            <!-- BEGIN item -->
                            <div class="item item-thumbnail">
                                <a href="product_detail.html" class="item-image">
                                    <img src="{{ asset('frontend/assets/img/product/product-iphone-se.png') }}" alt="" />
                                    <div class="discount">20% OFF</div>
                                </a>
                                <div class="item-info">
                                    <h4 class="item-title">
                                        <a href="product.html">iPhone SE<br />32/64Gb</a>
                                    </h4>
                                    <p class="item-desc">A big step for small.</p>
                                    <div class="item-price">$499.00</div>
                                    <div class="item-discount-price">$599.00</div>
                                </div>
                            </div>
                            <!-- END item -->
                        </div>
                        <!-- END item-row -->
                        <!-- BEGIN item-row -->
                        <div class="item-row">
                            <!-- BEGIN item -->
                            <div class="item item-thumbnail">
                                <a href="product_detail.html" class="item-image">
                                    <img src="{{ asset('frontend/assets/img/product/product-zenfone2.png') }}" alt="" />
                                    <div class="discount">15% OFF</div>
                                </a>
                                <div class="item-info">
                                    <h4 class="item-title">
                                        <a href="product_detail.html">Assus ZenFone 2<br />‏(ZE550ML)</a>
                                    </h4>
                                    <p class="item-desc">See What Others Can’t See</p>
                                    <div class="item-price">$399.00</div>
                                    <div class="item-discount-price">$453.00</div>
                                </div>
                            </div>
                            <!-- END item -->
                            <!-- BEGIN item -->
                            <div class="item item-thumbnail">
                                <a href="product_detail.html" class="item-image">
                                    <img src="{{ asset('frontend/assets/img/product/product-xperia-z.png') }}" alt="" />
                                    <div class="discount">32% OFF</div>
                                </a>
                                <div class="item-info">
                                    <h4 class="item-title">
                                        <a href="product.html">Sony Xperia Z<br />Black Color</a>
                                    </h4>
                                    <p class="item-desc">For unexpectedly beautiful moments</p>
                                    <div class="item-price">$599.00</div>
                                    <div class="item-discount-price">$799.00</div>
                                </div>
                            </div>
                            <!-- END item -->
                            <!-- BEGIN item -->
                            <div class="item item-thumbnail">
                                <a href="product_detail.html" class="item-image">
                                    <img src="{{ asset('frontend/assets/img/product/product-lumia-532.png') }}" alt="" />
                                    <div class="discount">20% OFF</div>
                                </a>
                                <div class="item-info">
                                    <h4 class="item-title">
                                        <a href="product.html">Microsoft Lumia 531<br />Smartphone Orange</a>
                                    </h4>
                                    <p class="item-desc">1 Year Local Manufacturer Warranty</p>
                                    <div class="item-price">$99.00</div>
                                    <div class="item-discount-price">$199.00</div>
                                </div>
                            </div>
                            <!-- END item -->
                        </div>
                        <!-- END item-row -->
                    </div>
                    <!-- END category-item -->
                </div>
                <!-- END category-detail -->
            </div>
            <!-- END category-container -->
        </div>
        <!-- END container -->
    </div>
    <!-- END #mobile-list -->
@endsection