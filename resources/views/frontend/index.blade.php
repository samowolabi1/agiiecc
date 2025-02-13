<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agii NG</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="AGII NG">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="frontend/assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="frontend/assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="frontend/assets/images/logo.png">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="frontend/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#8fc74a">
    <link rel="stylesheet"
        href="frontend/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="frontend/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="frontend/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="frontend/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="frontend/css/logo.css">
    <link rel="stylesheet" href="frontend/css/style.css">
    <link rel="stylesheet" href="frontend/assets/css/style.css">
    <link rel="stylesheet" href="frontend/assets/css/skins/skin-demo-14.css">
    <link rel="stylesheet" href="frontend/assets/css/demos/demo-14.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<style>
    .brand img {
        max-width: 100px;
        max-height: 50px;
        width: auto;
        height: auto;

    }
</style>

<body>

    <header class="header header-14">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <a href="tel:#"><i class="icon-phone"></i>Call: +234 913 500 0738</a>
                </div><!-- End .header-left -->

                <div class="header-right">

                    <ul class="top-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul class="menus">
                                <li class="around-me">
                                    <a href="#">Stores Around me</a>
                                </li>
                                <li>
                                    <div class="header-dropdown">
                                        <a href="#">Location</a>
                                        <div class="header-menu">
                                            <ul>
                                                {{-- TO DO --}}
                                                <li><a href="#">Ikeja</a></li>
                                                <li><a href="#">Island</a></li>
                                                <li><a href="#">Agege</a></li>
                                            </ul>
                                        </div><!-- End .header-menu -->
                                    </div><!-- End .header-dropdown -->
                                </li>
                                <li class="login">
                                    @if (auth()->user())
                                        <a href="logout">Sign in / Sign up</a>
                                    @else
                                        <a href="login">Sign in / Sign up</a>
                                    @endif

                                </li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-top -->


        <div class="container-fluid d-flex flex-column align-items-center justify-content-center">
            <!-- Site Logo -->
            <div class="mb-3 text-center">
                <a href="index.html">
                    <img src="frontend/images/Agiilogo2.png" alt="Site Logo" class="img-fluid"
                        style="height: 170px; width: auto;">
                </a>
            </div>

            <!-- Search Bar -->
            <div class="text-center col-12 col-md-8"> <!-- Increased column width -->
                <div class="header-search header-search-extended header-search-visible header-search-no-radius">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide d-flex">
                            <div class="select-custom">

                                <select class="form-control" name="ProductCategory" required>
                                    <option value='All' selected>All Categories</option>
                                    @foreach ($type as $ty)
                                        <option value="{{ $ty->id }}">{{ $ty->name }}</option>
                                    @endforeach
                                </select>

                            </div><!-- End .select-custom -->

                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control w-100" name="q" id="q"
                                placeholder="Search product ..." required style="max-width: 600px;">

                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>
        </div>


        <div class="header-bottom sticky-header">
            <div class="container-fluid">
                <div class="row">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="/category">Product</a>
                            </li>
                            <li>
                                <a href="/ride">Ride</a>
                            </li>
                            <li>
                                <a href="/service">Services</a>
                            </li>
                            <li>
                                <a href="/dashboard">My Dashboard</a>
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-9 col-xxl-8">
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
                                    <img src="frontend/assets/images/demos/demo-14/slider/slide-1.png"
                                        alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <img src="frontend/assets/images/demos/demo-14/slider/slide-2.png"
                                        alt="Image Desc">
                                </picture>
                            </figure><!-- End .slide-image -->
                        </div><!-- End .intro-slide -->

                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <img src="frontend/assets/images/demos/demo-14/slider/slide-3.png"
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

                                        @foreach ($product->images as $image)
                                            <img src="{{ asset($image->image_name) }}" alt="Product Image">
                                        @endforeach
                                    </a>
                                </figure>
                               <div class="product-body">
                                    <h3 class="product-title">
                                        <div class="product-cat">
                                            <a href="#" class="disabled"> {{ $product->type->name ?? 'N/A' }} </a>

                                        </div>
                                        <a href="{{ route('home.product', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-price">₦{{ number_format($product->price, 2) }}</div>
                                    {{-- <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: {{ $product->ratings() }}%;"></div>
                                        </div>
                                        <span class="ratings-text">({{ $product->reviews_count }} Reviews)</span>
                                    </div> --}}
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

        </div>

        <aside class="col-xl-3 col-xxl-2 order-xl-first">
            <div class="sidebar sidebar-home">
                <div class="mb-2 col-sm-6 col-xl-12">
                    <div class="widget widget-vendors">
                        <h4 class="widget-title"><span>Top Vendors</span></h4><!-- End .widget-title -->

                        <div class="vendors">
                            <div class="vendor vendor-sm" style="display: flex; align-items: center; gap: 13px;">
                                <figure class="vendor-media"
                                    style="flex-shrink: 0; border: 2px solid #8fc74a; border-radius: 50%; padding: 5px;">
                                    <img src="frontend/assets/images/vendors/vendor-1.jpg" alt="Vendor image"
                                        class="vendor-image"
                                        style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                                </figure>

                                <div class="vendor-body">
                                    <P class="vendor-title"
                                        style="font-size: 18px; font-weight: bold; color: #8fc74a;">TechWorld
                                        Electronics
                                    <P>
                                        <span>Category: Products</span><!-- End .vendor-title -->
                                    <p class="vendor-description" style="font-size: 12px;">Specialized in
                                        high-quality electronics, gadgets, and accessories.</p>
                                </div><!-- End .vendor-body -->
                            </div><!-- End .vendor vendor-sm --><br>

                            <div class="vendor vendor-sm" style="display: flex; align-items: center; gap: 15px;">
                                <figure class="vendor-media"
                                    style="flex-shrink: 0; border: 2px solid #8fc74a; border-radius: 50%; padding: 5px;">
                                    <img src="frontend/assets/images/vendors/vendor-1.jpg" alt="Vendor image"
                                        class="vendor-image"
                                        style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                                </figure>

                                <div class="vendor-body">
                                    <P class="vendor-title"
                                        style="font-size: 18px; font-weight: bold; color: #8fc74a;">TechWorld
                                        Electronics
                                    <P>
                                        <span>Category: Products</span><!-- End .vendor-title -->
                                    <p class="vendor-description" style="font-size: 12px;">Specialized in
                                        high-quality electronics, gadgets, and accessories.</p>
                                </div><!-- End .vendor-body -->
                            </div><!-- End .vendor vendor-sm --> <br>
                            <div class="vendor vendor-sm" style="display: flex; align-items: center; gap: 15px;">
                                <figure class="vendor-media"
                                    style="flex-shrink: 0; border: 2px solid #8fc74a; border-radius: 50%; padding: 5px;">
                                    <img src="frontend/assets/images/vendors/vendor-1.jpg" alt="Vendor image"
                                        class="vendor-image"
                                        style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                                </figure>

                                <div class="vendor-body">
                                    <P class="vendor-title"
                                        style="font-size: 18px; font-weight: bold; color: #8fc74a;">TechWorld
                                        Electronics
                                    <P>
                                        <span>Category: Products</span><!-- End .vendor-title -->
                                    <p class="vendor-description" style="font-size: 12px;">Specialized in
                                        high-quality electronics, gadgets, and accessories.</p>
                                </div><!-- End .vendor-body -->
                            </div><!-- End .vendor vendor-sm --><br>
                            <div class="vendor vendor-sm" style="display: flex; align-items: center; gap: 15px;">
                                <figure class="vendor-media"
                                    style="flex-shrink: 0; border: 2px solid #8fc74a; border-radius: 50%; padding: 5px;">
                                    <img src="frontend/assets/images/vendors/vendor-1.jpg" alt="Vendor image"
                                        class="vendor-image"
                                        style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;">
                                </figure>

                                <div class="vendor-body">
                                    <P class="vendor-title"
                                        style="font-size: 18px; font-weight: bold; color: #8fc74a;">TechWorld
                                        Electronics
                                    <P>
                                        <span>Category: Products</span><!-- End .vendor-title -->
                                    <p class="vendor-description" style="font-size: 12px;">Specialized in
                                        high-quality electronics, gadgets, and accessories.</p>
                                </div><!-- End .vendor-body -->
                            </div><!-- End .vendor vendor-sm --><br>

                        </div><!-- End .vendors -->
                    </div><!-- End .widget widget-vendors -->

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
                            <h4 class="widget-title"><span>Special Advert</span></h4><!-- End .widget-title -->

                            <div class="widget widget-banner">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="frontend/assets/images/demos/demo-14/banners/banner-1222.png"
                                            alt="Banner img desc">
                                    </a>
                                </div><!-- End .banner banner-overlay -->
                                <div class="widget widget-banner">
                                    <div class="banner banner-overlay">
                                        <a href="#">
                                            <img src="frontend/assets/images/demos/demo-14/banners/banner-1222.png"
                                                alt="Banner img desc">
                                        </a>
                                    </div><!-- End .banner banner-overlay -->
                                </div><!-- End .widget widget-banner -->
                            </div><!-- End .widget widget-banner -->
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



    {{-- footer --}}

    @include('frontend.component.footer')



</body>

</html>
