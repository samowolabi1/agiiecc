@extends('layouts.frontend')

{{-- nav and search sections --}}
@section('navSection')
    <!-- Search Bar -->

    <div class=" row">
        <div class="d-flex justify-content-center">
            <div class="text-center col-12 ">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">

                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Departments</option>
                                    <option value="1">Fashion</option>
                                    <option value="2">- Women</option>
                                    <option value="3">- Men</option>
                                    <option value="4">- Jewellery</option>
                                    <option value="5">- Kids Fashion</option>
                                    <option value="6">Electronics</option>
                                    <option value="7">- Smart TVs</option>
                                    <option value="8">- Cameras</option>
                                    <option value="9">- Games</option>
                                    <option value="10">Home &amp; Garden</option>
                                    <option value="11">Motors</option>
                                    <option value="12">- Cars and Trucks</option>
                                    <option value="15">- Boats</option>
                                    <option value="16">- Auto Tools &amp; Supplies</option>
                                </select>
                            </div><!-- End .select-custom -->

                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q"
                                placeholder="Search product ..." required>

                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
        </div>
    </div>
@endsection

@section('headerSection')
    <div class="header-bottom sticky-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-auto col-lg-3 col-xl-3 col-xxl-2 header-left">
                    <div class="dropdown category-dropdown show is-on" data-visible="true">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-display="static" title="Browse Categories"
                            style="background: #8fc74a">
                            Browse Categories
                        </a>

                        <div class="dropdown-menu show">
                            <nav class="side-nav">
                                <ul class="menu-vertical">
                                    <li>
                                        <a href="#"><i class="icon-laptop"></i>Electronics</a>
                                    </li>
                                    <li class="megamenu-container">
                                        <a href="#"><i class="icon-couch"></i>Furniture</a>
                                    </li>
                                    <li class="megamenu-container">
                                        <a href="#"><i class="icon-concierge-bell"></i>Cooking</a>
                                    </li>
                                    <li class="megamenu-container">
                                        <a href="#"><i class="icon-tshirt"></i>Clothing</a>


                                    </li>
                                    <li><a href="#"><i class="icon-blender"></i>Home Appliances</a></li>
                                    <li><a href="#"><i class="icon-heartbeat"></i>Healthy & Beauty</a></li>
                                    <li><a href="#"><i class="icon-shoe-prints"></i>Shoes & Boots</a></li>
                                    <li><a href="#"><i class="icon-map-signs"></i>Travel & Outdoor</a></li>
                                    <li><a href="#"><i class="icon-mobile-alt"></i>Smart Phones</a></li>
                                    <li><a href="#"><i class="icon-tv"></i>TV & Audio</a></li>
                                    <li><a href="#"><i class="icon-shopping-bag"></i>Backpack & Bag</a></li>
                                    <li><a href="#"><i class="bi bi-house-door"></i> Real Estate</a></li>
                                    <li><a href="#"><i class="bi bi-tools"></i> Services</a></li>

                                    <li><a href="#"><i class="icon-gift"></i>Gift Ideas</a></li>
                                </ul><!-- End .menu-vertical -->
                            </nav><!-- End .side-nav -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .category-dropdown -->
                </div><!-- End .col-xl-3 col-xxl-2 -->

                <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                    @include('layouts.marketplaceNavbar')
                </div><!-- End .col-xl-9 col-xxl-10 -->

                <div class="col col-lg-3 col-xl-3 col-xxl-2 header-right">

                </div>
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-bottom -->
@endsection

@section('mainSection')
    <main class="main">
        <div class="mb-lg-2"></div><!-- End .mb-lg-2 -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-xxl-8 offset-lg-3 offset-xxl-2">
                    <div class="mb-2 intro-slider-container slider-container-ratio">
                        <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl"
                            data-owl-options='{
                "nav": false,
                "dots": true,
                "autoplay": true,
                "autoplayTimeout": 4000,
                "autoplayHoverPause": true,
                "loop": true
            }'>
                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <img src="{{ url('frontend/assets/images/demos/demo-14/slider/slide-1.png') }}"
                                            alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->
                            </div><!-- End .intro-slide -->

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <img src="{{ url('frontend/assets/images/demos/demo-14/slider/slide-2.png') }}"
                                            alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->
                            </div><!-- End .intro-slide -->

                            <div class="intro-slide">
                                <figure class="slide-image">
                                    <picture>
                                        <img src="{{ url('frontend/assets/images/demos/demo-14/slider/slide-3.png') }}"
                                            alt="Image Desc">
                                    </picture>
                                </figure><!-- End .slide-image -->

                            </div><!-- End .intro-slide -->
                        </div><!-- End .intro-slider owl-carousel owl-simple -->

                        <span class="slider-loader"></span><!-- End .slider-loader -->
                    </div><!-- End .intro-slider-container -->
                </div><!-- End .col-xl-9 col-xxl-10 -->
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-xxl-10">
                    <div class="owl-carousel owl-simple brands-carousel" data-toggle="owl"
                        data-owl-options='{
                        "nav": false,
                        "dots": false,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1600": {
                                "items":6,
                                "nav": true
                            }
                        }
                    }'>
                        <a href="#" class="brand">
                            <img src="frontend/assets/images/brands/1.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="frontend/assets/images/brands/2.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="frontend/assets/images/brands/3.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="frontend/assets/images/brands/4.png" alt="Brand Name">
                        </a>
                    </div><!-- End .owl-carousel -->

                    <br>
                    <br>
                    <div class="container"> <!-- Added a container for proper alignment -->
                        @foreach ($products as $index => $product)
                            @if ($index % 4 == 0)
                                <!-- Start a new row every 4 products -->
                                <div class="row cat-banner-row clothing">
                            @endif

                            <div class="col-md-3 col-6">
                                <!-- Each product takes 3 columns on medium+ screens, 6 on smaller screens -->
                                <div class="text-center product">
                                    <figure class="product-media">
                                        <a href="{{ route('home.product', $product->id) }}">
                                            {{-- <img src="{{ asset($product->productMainImage ) }}"
                                                 alt="Product image" class="product-image"> --}}
                                            @foreach ($product->images as $image)
                                                <img src="{{ asset($image->image_name) }}" alt="Product Image">
                                            @endforeach
                                        </a>
                                    </figure>
                                    <div class="product-body">
                                        <h3 class="product-title">
                                            <a href="{{ route('home.product', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product-price">₦{{ number_format($product->price, 2) }}</div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                {{-- <div class="ratings-val" style="width: {{ $product->ratings() }}%;"></div> --}}
                                            </div>
                                            <span class="ratings-text">({{ $product->reviews_count }} Reviews)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (($index + 1) % 4 == 0 || $loop->last)
                                <!-- Close row after 4 products -->
                    </div> <!-- End Row -->

                    @if (($index + 1) % 8 == 0)
                        <!-- Display ads after every second row (8 products) -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="{{ asset('frontend/assets/images/demos/demo-14/banners/banner-88.png') }}"
                                            alt="Banner img desc">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner banner-overlay">
                                    <a href="ride.html">
                                        <img src="{{ asset('frontend/assets/images/demos/demo-14/banners/banner-8.png') }}"
                                            alt="Banner img desc">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endif
                    @endforeach
                </div> <!-- End Container -->

                <!-- Pagination Section -->
                <div class="pagination">
                    {{ $products->links() }} <!-- Pagination links -->
                </div>


                <div class="pagination">
                    {{ $products->links() }} <!-- Pagination links -->
                </div>





                <div class="mb-3"></div><!-- End .mb-3 -->



                <div class="mb-3"></div><!-- End .mb-3 -->



                <div class="mb-3"></div><!-- End .mb-3 -->



                <div class="mb-5"></div><!-- End .mb-5 -->



            </div>








            <aside class="col-xl-3 col-xxl-2 order-xl-first">
                <div class="sidebar sidebar-home">
                    <div class="mb-2 col-sm-6 col-xl-12">
                        <div class="widget widget-products">
                            <h4 class="widget-title"><span>Bestsellers</span></h4><!-- End .widget-title -->

                            <div class="products">
                                <div class="product product-sm">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="frontend/assets/images/demos/demo-14/products/small/product-1.jpg"
                                                alt="Product image" class="product-image">
                                        </a>
                                    </figure>

                                    <div class="product-body">
                                        <h5 class="product-title"><a href="product.html">Sceptre 50" Class FHD (1080P)
                                                LED TV</a></h5><!-- End .product-title -->
                                        <div class="product-price">
                                            ₦199.99
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product product-sm -->

                                <div class="product product-sm">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="frontend/assets/images/demos/demo-14/products/small/product-2.jpg"
                                                alt="Product image" class="product-image">
                                        </a>
                                    </figure>

                                    <div class="product-body">
                                        <h5 class="product-title"><a href="product.html">Red Cookware Set, 9 Piece</a>
                                        </h5><!-- End .product-title -->
                                        <div class="product-price">
                                            ₦24.95
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product product-sm -->

                                <div class="product product-sm">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="frontend/assets/images/demos/demo-14/products/small/product-3.jpg"
                                                alt="Product image" class="product-image">
                                        </a>
                                    </figure>

                                    <div class="product-body">
                                        <h5 class="product-title"><a href="product.html">Epson WorkForce WF-2750
                                                All-in-One Wireless</a></h5><!-- End .product-title -->
                                        <div class="product-price">
                                            ₦49.99
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product product-sm -->

                                <div class="product product-sm">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="frontend/assets/images/demos/demo-14/products/small/product-4.jpg"
                                                alt="Product image" class="product-image">
                                        </a>
                                    </figure>

                                    <div class="product-body">
                                        <h5 class="product-title"><a href="product.html">Stainless Steel Microwave
                                                Oven</a></h5><!-- End .product-title -->
                                        <div class="product-price">
                                            ₦64.84
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product product-sm -->

                                <div class="product product-sm">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="frontend/assets/images/demos/demo-14/products/small/product-5.jpg"
                                                alt="Product image" class="product-image">
                                        </a>
                                    </figure>

                                    <div class="product-body">
                                        <h5 class="product-title"><a href="product.html">Fatboy Original Beanbag</a>
                                        </h5><!-- End .product-title -->
                                        <div class="product-price">
                                            ₦49.99
                                        </div><!-- End .product-price -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product product-sm -->
                            </div><!-- End .products -->
                        </div><!-- End .widget widget-products -->
                    </div><!-- End .col-sm-6 col-xl-12 -->

                    <div class="col-12">
                        <div class="col-sm-6 col-xl-12">
                            <div class="widget widget-banner">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="frontend/assets/images/demos/demo-14/banners/banner-12.png"
                                            alt="Banner img desc">
                                    </a>
                                </div><!-- End .banner banner-overlay -->
                            </div><!-- End .widget widget-banner -->

                            <div class="widget widget-deals">
                                <h4 class="widget-title"><span>Special Offer</span></h4><!-- End .widget-title -->

                                <div class="row">
                                    <div class="col-sm-6 col-xl-12">
                                        <div class="text-center product">
                                            <figure class="product-media">
                                                <span class="product-label label-sale">Deal of the week</span>
                                                <a href="product.html">
                                                    <img src="frontend/assets/images/demos/demo-14/products/deals/product-1.jpg"
                                                        alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                        title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                        title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action-vertical -->



                                                <div class="product-body">
                                                    <div class="product-cat">
                                                        <a href="#">Audio</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a href="product.html">Bose SoundLink
                                                            Micro speaker</a></h3><!-- End .product-title -->
                                                    <div class="product-price">
                                                        <span class="new-price">₦99.99</span>
                                                        <span class="old-price">Was ₦110.99</span>
                                                    </div><!-- End .product-price -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 100%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                        <span class="ratings-text">( 4 Reviews )</span>
                                                    </div><!-- End .rating-container -->

                                                    <div class="product-nav product-nav-dots">
                                                        <a href="#" class="active"
                                                            style="background: #f3815f;"><span class="sr-only">Color
                                                                name</span></a>
                                                        <a href="#" style="background: #333333;"><span
                                                                class="sr-only">Color name</span></a>
                                                    </div><!-- End .product-nav -->
                                                </div><!-- End .product-body -->

                                                <div class="product-countdown" data-until="+44h" data-relative="true"
                                                    data-labels-short="true"></div><!-- End .product-countdown -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-xl-12 -->

                                    <div class="col-sm-6 col-xl-12">
                                        <div class="text-center product">
                                            <figure class="product-media">
                                                <span class="product-label label-sale">Deal of the week</span>
                                                <a href="product.html">
                                                    <img src="frontend/assets/images/demos/demo-14/products/deals/product-2.jpg"
                                                        alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist"
                                                        title="Add to wishlist"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                        title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare"
                                                        title="Compare"><span>Compare</span></a>
                                                </div><!-- End .product-action-vertical -->



                                                <div class="product-body">
                                                    <div class="product-cat">
                                                        <a href="#">Cameras</a>
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title"><a href="product.html">GoPro HERO
                                                            Session Waterproof HD Action Camera</a></h3>
                                                    <!-- End .product-title -->
                                                    <div class="product-price">
                                                        <span class="new-price">₦196.99</span>
                                                        <span class="old-price">Was ₦210.99</span>
                                                    </div><!-- End .product-price -->
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 100%;"></div>
                                                            <!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                        <span class="ratings-text">( 19 Reviews )</span>
                                                    </div><!-- End .rating-container -->
                                                </div><!-- End .product-body -->

                                                <div class="product-countdown" data-until="+52h" data-relative="true"
                                                    data-labels-short="true"></div><!-- End .product-countdown -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-xl-12 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget widget-deals -->
                        </div><!-- End .col-sm-6 col-lg-xl -->

                        <div class="col-sm-6 col-xl-12">
                            <div class="widget widget-banner">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="frontend/assets/images/demos/demo-14/banners/banner-122.png"
                                            alt="Banner img desc">
                                    </a>
                                </div><!-- End .banner banner-overlay -->
                            </div><!-- End .widget widget-banner -->
                        </div><!-- End .col-sm-6 col-lg-12 -->


                    </div><!-- End .row -->




                </div><!-- End .sidebar sidebar-home -->
            </aside><!-- End .col-lg-3 col-xxl-2 -->
        </div><!-- End .row -->
        </div><!-- End .container-fluid -->

    </main><!-- End .main -->
@endsection
