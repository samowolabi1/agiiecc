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



    <!-- Bootstrap Icons CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> --}}

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('frontend/assets/images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('frontend/assets/images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('frontend/assets/images/logo.png') }}">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ url('frontend/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#8fc74a">

    <!-- Plugins CSS File -->
    <link rel="stylesheet"
        href="{{ url('frontend/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/plugins/jquery.countdown.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ url('frontend/css/logo.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/assets/css/skins/skin-demo-14.css') }}">
    {{-- <link rel="stylesheet" href="{{ url('frontend/assets/css/demos/demo-14.css') }}"> --}}

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
                                    @if (!auth()->user())
                                        <li class="login">
                                            <a href="{{ url('login') }}">Sign in / Sign up</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->
        </header>



        <div class="p-0 container-fluid">
            <!-- Site Logo -->
            <div class="row">
                <div class="text-center col-12">
                    <a href="index.html">
                        <img src="/frontend/images/Agiilogo2.png" alt="Site Logo" class="img-fluid"
                            style="height: 170px; width: auto;">
                    </a>
                </div>
            </div>

            @yield('navSection')
            <br><br><br>

            @yield('headerSection')

        </div>

        @yield('mainSection')


    </div>

    <section class="mt-5">
        <footer class="footer" style="background-color: #8fc74a; color:white;">
            <div class="footer-middle">
                <div class="container">
                    <div class="row" st>
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="frontend/assets/images/logo.png" class="footer-logo" alt="Footer Logo"
                                    width="105" height="25">
                                <p style="color: white;">Praesent dapibus, neque id cursus ucibus, tortor neque
                                    egestas augue, eu vulputate magna eros eu erat. </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                                            class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                                            class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                                            class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" target="_blank" title="Pinterest"><i
                                            class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="about.html">About Agii NG</a></li>
                                    <li><a href="#">How to shop on Agii Ng</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    @if (!auth()->user())
                                        <li><a href="{{ url('login') }}">Log in</a></li>
                                    @endif
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="contact.html">Contact us</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Sign In</a></li>

                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright" style="color: white;">Copyright © 2025 Agii NG. All Rights
                        Reserved.</p><!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <img src="frontend/assets/images/payments.png" alt="Payment methods" width="272"
                            height="20">
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </section>
    </div><!-- End .page-wrapper -->

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
