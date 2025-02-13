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

    <!-- Line Awesome Icons -->
    <link rel="stylesheet"
        href="{{ asset('frontend/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/jquery.countdown.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/nouislider/nouislider.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/logo.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">




</head>

<body>


    <div class="page-wrapper">
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
                                                    <li><a href="#">Ikeja</a></li>
                                                    <li><a href="#">Island</a></li>
                                                    <li><a href="#">Agege</a></li>
                                                </ul>
                                            </div><!-- End .header-menu -->
                                        </div><!-- End .header-dropdown -->
                                    </li>
                                    <li class="login">
                                        @if (auth()->user())
                                            <a href="logout">Sign out</a>
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
        </header>

        <div class="p-0 container-fluid">
            <!-- Site Logo -->
            <div class="row justify-content-center">
                <div class="text-center col-12">
                    <a href="index">
                        <img src="/frontend/images/Agiilogo2.png" alt="Site Logo" class="img-fluid"
                            style="height: 170px; width: auto;">
                    </a>
                </div>
            </div>
        </div>

        <div class="header-bottom sticky-header" style="background-color: rgb(50, 50, 50);">
            <div class="container-fluid">
                <div class="row">
                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li>
                                <a href="/" style="color: #ffffff;">Home</a>
                            </li>
                            <li>
                                <a href="/category" style="color: #ffffff;">Product</a>
                            </li>
                            <li>
                                <a href="/ride" style="color: #ffffff;">Ride</a>
                            </li>
                            <li>
                                <a href="/service" style="color: #ffffff;">Services</a>
                            </li>
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div>
            </div>
        </div><!-- End .header-middle -->

        @yield('mainSection')



    </div>

    {{-- footer --}}

    <br>  <br>

    @include('../frontend.component.footer')

    <!-- Plugins JS File -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/superfish.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wNumb.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
