@extends('layouts.frontend')

@section('headerSection')
    <div class="header-bottom sticky-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                    @include('layouts.marketplaceNavbar')
                </div><!-- End .col-xl-9 col-xxl-10 -->

                <div class="col col-lg-3 col-xl-3 col-xxl-2 header-right">

                </div>
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </div>
@endsection

@section('mainSection')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('/frontend/assets/images/about-header-bg.jpg')">
            <h1 class="page-title text-white">About us<span class="text-white">Who we are</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <h2 class="title">Our Vision</h2><!-- End .title -->
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. </p>
                </div><!-- End .col-lg-6 -->

                <div class="col-lg-6">
                    <h2 class="title">Our Mission</h2><!-- End .title -->
                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. <br>Praesent elementum hendrerit tortor. Sed semper lorem at felis. </p>
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <div class="mb-5"></div><!-- End .mb-4 -->
        </div><!-- End .container -->

        <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-3 mb-lg-0">
                        <h2 class="title">Who We Are</h2><!-- End .title -->
                        <p class="lead text-primary mb-3">Pellentesque odio nisi, euismod pharetra a ultricies <br>in diam. Sed arcu. Cras consequat</p><!-- End .lead text-primary -->
                        <p class="mb-2">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, uctus metus libero eu augue. </p>
                    </div><!-- End .col-lg-5 -->

                    <div class="col-lg-6 offset-lg-1">
                        <div class="about-images">
                            <img src="/frontend/assets/images/about/img-1.jpg" alt="" class="about-img-front">
                            <img src="/frontend/assets/images/about/img-2.jpg" alt="" class="about-img-back">
                        </div><!-- End .about-images -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .bg-light-2 pt-6 pb-6 -->

        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="brands-text">
                        <h2 class="title">The world's premium design brands in one destination.</h2><!-- End .title -->
                        <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nis</p>
                    </div><!-- End .brands-text -->
                </div><!-- End .col-lg-5 -->
                <div class="col-lg-7">
                    <div class="brands-display">
                        <div class="row justify-content-center">
                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/1.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/2.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/3.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/4.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/5.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/6.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/7.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/8.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4">
                                <a href="#" class="brand">
                                    <img src="/frontend/assets/images/brands/9.png" alt="Brand Name">
                                </a>
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->
                    </div><!-- End .brands-display -->
                </div><!-- End .col-lg-7 -->
            </div><!-- End .row -->

            <hr class="mt-4 mb-6">



        <div class="mb-2"></div><!-- End .mb-2 -->

        <div class="about-testimonials bg-light-2 pt-6 pb-6">
            <div class="container">
                <h2 class="title text-center mb-3">What Customer Say About Us</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple owl-testimonials-photo" data-toggle="owl"
                    data-owl-options='{
                        "nav": false,
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "1200": {
                                "nav": true
                            }
                        }
                    }'>
                    <blockquote class="testimonial text-center">
                        <img src="/frontend/assets/images/testimonials/user-1.jpg" alt="user">
                        <p>“ Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque aliquet nibh nec urna. <br>In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. ”</p>
                        <cite>
                            Jenson Gregory
                            <span>Customer</span>
                        </cite>
                    </blockquote><!-- End .testimonial -->

                    <blockquote class="testimonial text-center">
                        <img src="/frontend/assets/images/testimonials/user-2.jpg" alt="user">
                        <p>“ Impedit, ratione sequi, sunt incidunt magnam et. Delectus obcaecati optio eius error libero perferendis nesciunt atque dolores magni recusandae! Doloremque quidem error eum quis similique doloribus natus qui ut ipsum.Velit quos ipsa exercitationem, vel unde obcaecati impedit eveniet non. ”</p>

                        <cite>
                            Victoria Ventura
                            <span>Customer</span>
                        </cite>
                    </blockquote><!-- End .testimonial -->
                </div><!-- End .testimonials-slider owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .bg-light-2 pt-5 pb-6 -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
