<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./frontend/assets/styles/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script defer src="./frontend/assets/script.js"></script>
    <link rel="icon" type="image/x-icon" href="frontend/images/Agiilogo1.png" />

    <title>Agii Ride</title>

 <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

<!-- External CSS Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<!-- Bootstrap & Plugins CSS Files -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/jquery.countdown.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/nouislider/nouislider.css') }}">

<!-- Custom Stylesheets -->
<link rel="stylesheet" href="{{ asset('frontend/css/logo.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">


</head>
<style>

    .main__cta__rectangle {
                max-width: 450px;
                margin: auto;
                padding: 30px;
                background: white;
                border-radius: 15px;  /* Rounded corners */
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
            }
            .btn-primary {
                width: 100%;
                font-size: 18px;
            }
            #nearestDriver {
                margin-top: 10px;
                font-weight: bold;
                color: green;
                text-align: center;
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
                                                  <li><a href="#">Ikeja</a></li>
                                                  <li><a href="#">Island</a></li>
                                                  <li><a href="#">Agege</a></li>
                                              </ul>
                                          </div><!-- End .header-menu -->
                                      </div><!-- End .header-dropdown -->
                                  </li>
                              </ul>
                          </li>
                      </ul><!-- End .top-menu -->
                  </div><!-- End .header-right -->
              </div><!-- End .container -->
          </div><!-- End .header-top -->
      </header>
        <header class="" style="background-color: white;">
          <div class="container">
            <nav>
              <div>
                <img src="./frontend/images/Agiilogo2.png" style="height: 70px; padding-right: 50px;" alt="">
                <ul class="nav-links">
                  {{-- <li><a href="#">Company</a></li> --}}
                  {{-- <li><a href="#">Safety</a></li> --}}
                  <li>
                    <a href="/">Marketplace</a>
                </li>
                  {{-- <li><a href="#">Help</a></li> --}}
                </ul>
              </div>
              <div>
                <ul id="nav-links" class="nav-links">
                    @if (auth()->user())
                    <li><a href="logout" class="nav__cta">Sign out</a></li>
                    @else
                    <li><a href="login">Log in</a></li>

                    @endif

                </ul>
              </div>
              <div class="hamburger">
                <span class="hamburger-bar"></span
                ><span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
              </div>
            </nav>
          </div>
        </header>

    @yield('sectionmain')

    <br><br>
    @include('frontend.component.footer')

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
