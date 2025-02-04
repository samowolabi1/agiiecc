<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Agii') }}</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

  
  <!-- theme meta -->
  <meta name="theme-name" content="aviato" />
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="{{ asset('plugins/themefisher-font/style.css') }}">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">


  
  <!-- Animate css -->
  <link rel="stylesheet" href="{{ asset('plugins/animate/animate.css') }}">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="{{ asset('plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/slick/slick-theme.css') }}">

  <link href="{{ asset('plugins/bootstrap/css/bootstrap5.min.css')}}" rel="stylesheet">


  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>Call Us - 234- 12323-123123</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="{{url('/')}}">
                        <!-- replace logo here -->
                        <img src="{{asset('img/agiilogo2.png')}}">
                      
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
<!--  -->

        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="dropdown cart-nav dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Hello &nbsp; {{ Auth::user()->firstname }} </a>
                        <div class="dropdown-menu cart-dropdown">
                            <!-- Cart Item -->
                            <div class="media">
                                
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="{{route('dashboard')}}">Dashboard</a></h4>
                                    
                                </div>
                                
                            </div><!-- / Cart Item -->

                            <!-- Cart Item -->
                            <div class="media">
                               
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#!" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </h4>
                                    
                                </div>
                            </div><!-- / Cart Item -->

                        </div>

                    </li>
                    <!--  -->
                         
                        @endguest
<!--  -->

                    <!-- Search -->
                    <li class="dropdown search dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
                                class="tf-ion-ios-search-strong"></i> Search</a>
                        <ul class="dropdown-menu search-dropdown">
                            <li>
                                <form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
                            </li>
                        </ul>
                    </li><!-- / Search -->


                    <!-- Location-->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"> Location</a>
                        <ul class="dropdown-menu search-dropdown">
                            <li class="nav-item">
                                    <a class="nav-link" href="#">Island</a>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link" href="#">Ikeja</a>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link" href="#">Agege</a>
                            </li>
                        </ul>
                    </li><!-- / Search -->


                   

                </ul><!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- / .navbar-header -->

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">



                    <!-- Product -->
                    <li class="dropdown full-width dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                            role="button" aria-haspopup="true" aria-expanded="false">Ride <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Introduction -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Wears</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="contact.html">Clothes</a></li>
                                        <li><a href="about.html">Shoes</a></li>
                                    </ul>
                                </div>

                                <!-- Contact -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Food Items</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="dashboard.html">Grains</a></li>
                                        <li><a href="order.html">Processed</a></li>
                                    </ul>
                                </div>

                                <!-- Utility -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Electronics</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="login.html">Television</a></li>
                                        <li><a href="signin.html">Mobile Phones</a></li>
                                    </ul>
                                </div>

                                <!-- Mega Menu -->
                                <div class="col-sm-3 col-xs-12">
                                    <a href="shop.html">
                                        <img class="img-responsive" src="images/shop/header-img.jpg" alt="menu image" />
                                    </a>
                                </div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Pages -->


                    <!-- Pages -->
                    <li class="dropdown full-width dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                            role="button" aria-haspopup="true" aria-expanded="false">Products <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Introduction -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Transportation</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="contact.html">Shatter</a></li>
                                        <li><a href="about.html">Individual</a></li>
                                    </ul>
                                </div>

                                <!-- Contact -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Professionals</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="dashboard.html">Catering</a></li>
                                        <li><a href="order.html">Shoemaking</a></li>
                                    </ul>
                                </div>

                                <!-- Utility -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Real Estate</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="login.html">Rentals</a></li>
                                        <li><a href="signin.html">For Sale</a></li>
                                    </ul>
                                </div>

                                <!-- Mega Menu -->
                                <div class="col-sm-3 col-xs-12">
                                    <a href="#">
                                        <img class="img-responsive" src="images/shop/header-img.jpg" alt="menu image" />
                                    </a>
                                </div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Pages -->



                     <!-- Others-->
                    <li class="dropdown full-width dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                            role="button" aria-haspopup="true" aria-expanded="false">Services <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Introduction -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Unique Services</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="contact.html">Training</a></li>
                                        <li><a href="about.html">Errand</a></li>
                                    </ul>
                                </div>

                                    <!-- Contact -->
                                <div class="col-sm-3 col-xs-12">
                                    <ul>
                                        <li class="dropdown-header">Unique Prducts</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="dashboard.html">Art</a></li>
                                        <li><a href="order.html">Used Items</a></li>
                                    </ul>
                                </div>

                                <!-- Mega Menu -->
                                <div class="col-sm-3 col-xs-12">
                                    <a href="#">
                                        <img class="img-responsive" src="images/shop/header-img.jpg" alt="menu image" />
                                    </a>
                                </div>
                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Pages -->


             
                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>

        
            @yield('content')
            @include('sweetalert::alert')
            
<footer class="footer section text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="social-media">
                    <li>
                        <a href="https://www.facebook.com/themefisher">
                            <i class="tf-ion-social-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/themefisher">
                            <i class="tf-ion-social-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/themefisher">
                            <i class="tf-ion-social-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.pinterest.com/themefisher/">
                            <i class="tf-ion-social-pinterest"></i>
                        </a>
                    </li>
                </ul>
                <ul class="footer-menu text-uppercase">
                    <li>
                        <a href="contact.html">CONTACT US</a>
                    </li>
                    <li>
                        <a href="shop.html">ALL ITEMS</a>
                    </li>
                    <li>
                        <a href="pricing.html">Pricing</a>
                    </li>
                    <li>
                        <a href="contact.html">PRIVACY POLICY</a>
                    </li>
                    <li>
                        <a href="contact.html">TERMS AND CONDITIONS</a>
                    </li>
                </ul>
                <!-- <p class="copyright-text">Copyright &copy;2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a></p> -->
            </div>
        </div>
    </div>

</footer>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('plugins/bootstrap/js/bootstrap5.bundle.min.js') }}"></script>

    <!-- Bootstrap Touchpin -->
    <script src="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Instagram Feed Js -->
    <script src="{{ asset('plugins/instafeed/instafeed.min.js') }}"></script>
    <!-- Video Lightbox Plugin -->
    <script src="{{ asset('plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>
    <!-- Count Down Js -->
    <script src="{{ asset('plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- slick Carousel -->
    <script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('plugins/slick/slick-animation.min.js') }}"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('plugins/google-map/gmap.js') }}"></script>

    <!-- Main Js File -->
    <script src="{{ asset('js/script.js') }}"></script>
    


  </body>
  </html>



