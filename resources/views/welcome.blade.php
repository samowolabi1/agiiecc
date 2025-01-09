

@extends('layouts.master')

@section('content')


<div class="hero-slider">
  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-center">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ url('shop') }}">Shop Now</a>
        </div>
      </div>
    </div>
  </div>

  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-3.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-left">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ url('shop') }}">Shop Now</a>
        </div>
      </div>
    </div>
  </div>

  <div class="slider-item th-fullpage hero-area" style="background-image: url(images/slider/slider-2.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 text-right">
          <p data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".1">PRODUCTS</p>
          <h1 data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".5">The beauty of nature <br> is hidden in details.</h1>
          <a data-duration-in=".3" data-animation-in="fadeInUp" data-delay-in=".8" class="btn" href="{{ url('shop') }}">Shop Now</a>
        </div>
      </div>
    </div>
  </div>
</div>



<section class="product-category section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title text-center">
                    <h2>Item Category</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="category-box">
                    <a href="#!">
                        <img src="images/shop/category/category-1.jpg" alt="" />
                        <div class="content">
                            <h3>Products</h3>
                            <p>Shop New Season Clothing</p>
                        </div>
                    </a>    
                </div>
                <div class="category-box">
                    <a href="#!">
                        <img src="images/shop/category/category-2.jpg" alt="" />
                        <div class="content">
                            <h3>Services</h3>
                            <p>Get Wide Range Selection</p>
                        </div>
                    </a>    
                </div>
            </div>
            <div class="col-md-6">
                <div class="category-box category-box-2">
                    <a href="#!">
                        <img src="images/shop/category/category-3.jpg" alt="" />
                        <div class="content">
                            <h3>Other Items</h3>
                            <p>Special Design Comes First</p>
                        </div>
                    </a>    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5" style="background-color: #f8f9fa;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <a href="your-link-here.com" target="_blank">
                    <img src="img/banner-1.png" alt="Banner Ad" class="img-fluid rounded shadow" style="width: 150%; object-fit: cover;">
                </a>
            </div>
        
    </div>
</section>

<section class="products section bg-gray">
    <div class="container">
        <div class="row">
            <div class="title text-center">
                <h2>Popular Items</h2>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <span class="bage">Sale</span>
                        <img class="img-responsive" src="images/shop/products/product-1.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#!" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                                <!-- <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Reef Boardsport</a></h4>
                        <p class="price">&#8358;200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="images/shop/products/product-2.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                                <!-- <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                        <p class="price">&#8358;200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="images/shop/products/product-3.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                                <!-- <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Strayhorn SP</a></h4>
                        <p class="price">&#8358;230</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="images/shop/products/product-4.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                                <!-- <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Bradley Mid</a></h4>
                        <p class="price">&#8358;200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="images/shop/products/product-5.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                                <!-- <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                        <p class="price">&#8358;200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="images/shop/products/product-6.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                                <!-- <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                        <p class="price">&#8358;200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <span class="bage">Sale</span>
                        <img class="img-responsive" src="images/shop/products/product-7.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                             <!--    <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                        <p class="price">&#8358;200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="images/shop/products/product-8.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                               <!--  <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                        <p class="price">&#8358;200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-item">
                    <div class="product-thumb">
                        <img class="img-responsive" src="images/shop/products/product-9.jpg" alt="product-img" />
                        <div class="preview-meta">
                            <ul>
                                <li>
                                    <span  data-toggle="modal" data-target="#product-modal">
                                        <i class="tf-ion-ios-search-strong"></i>
                                    </span>
                                </li>
                                <li>
                                    <a href="#" ><i class="tf-ion-ios-heart"></i></a>
                                </li>
                               <!--  <li>
                                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h4><a href="product-single.html">Rainbow Shoes</a></h4>
                        <p class="price">&#8358;200</p>
                    </div>
                </div>
            </div>
        
        <!-- Modal -->
        <div class="modal product-modal fade" id="product-modal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tf-ion-close"></i>
            </button>
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <div class="modal-image">
                                    <img class="img-responsive" src="images/shop/products/modal-product.jpg" alt="product-img" />
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="product-short-details">
                                    <h2 class="product-title">GM Pendant, Basalt Grey</h2>
                                    <p class="product-price">&#8358;200</p>
                                    <p class="product-short-description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem iusto nihil cum. Illo laborum numquam rem aut officia dicta cumque.
                                    </p>
                                    <a href="cart.html" class="btn btn-main">View Details</a>
                                    <!-- <a href="product-single.html" class="btn btn-transparent">View Product Details</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal -->

        </div>
    </div>
    <br>
</section>
<section class="py-5" style="background-color: #f8f9fa;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <a href="your-link-here.com" target="_blank">
                    <img src="img/banner-1.png" alt="Banner Ad" class="img-fluid rounded shadow" style="width: 150%; object-fit: cover;">
                </a>
            </div>
        
    </div>
</section>
<!--
Start Call To Action
==================================== -->
<section class="call-to-action bg-gray section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="title">
                    <h2>Get New Item Alert</h2>
                    <p>Stay updated with the latest arrivals! Be the first to know when new items hit our store. <br>Whether you're looking for trendy accessories, gadgets, or apparel, <br> we've got you covered.</p>
                </div>
                <div class="col-lg-6 col-md-offset-3">
                    <div class="input-group subscription-form">
                      <input type="text" class="form-control" placeholder="Enter Your Email Address">
                      <span class="input-group-btn">
                        <button class="btn btn-main" type="button">Subscribe Now!</button>
                      </span>
                    </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->

            </div>
        </div>      <!-- End row -->
    </div>      <!-- End container -->
</section>   <!-- End section -->


<section id="features" class="py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Why Choose Us</h2>
      <p class="text-muted">Experience top-notch service tailored to meet your needs.</p>
    </div>
    <div class="row text-center">
      <!-- Fast & Prompt Delivery -->
      <div class="col-md-3 mb-4">
        <div class="card border-0 bg-transparent">
          <div class="icon-wrapper mb-3">
            <i class="bi bi-truck text-success" style="font-size: 50px; color: #8fc74a;"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-semibold">Fast & Prompt Delivery</h5>
            <p class="text-muted">Get your orders delivered quickly and reliably.</p>
          </div>
        </div>
      </div>

      <!-- 24/7 Support -->
      <div class="col-md-3 mb-4">
        <div class="card border-0 bg-transparent">
          <div class="icon-wrapper mb-3">
            <i class="bi bi-headset text-success" style="font-size: 50px; color: #8fc74a;"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-semibold">24/7 Support</h5>
            <p class="text-muted">Always here for you at <br> +234 XXX XX XXXX.</p>
          </div>
        </div>
      </div>

      <!-- Best Price Guaranteed -->
      <div class="col-md-3 mb-4">
        <div class="card border-0 bg-transparent">
          <div class="icon-wrapper mb-3">
            <i class="bi bi-tag text-success" style="font-size: 50px; color: #8fc74a;"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-semibold">Best Price Guaranteed</h5>
            <p class="text-muted">Competitive pricing with unmatched value.</p>
          </div>
        </div>
      </div>

      <!-- 7 Days Return Policy -->
      <div class="col-md-3 mb-4">
        <div class="card border-0 bg-transparent">
          <div class="icon-wrapper mb-3">
            <i class="bi bi-arrow-repeat text-success" style="font-size: 50px; color: #8fc74a;"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title fw-semibold">7 Days Return Policy</h5>
            <p class="text-muted">Shop with confidence and flexibility.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<br>
<br>
<section class="py-5" style="background-color: #f8f9fa;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <a href="your-link-here.com" target="_blank">
                    <img src="img/banner-1.png" alt="Banner Ad" class="img-fluid rounded shadow" style="width: 150%; object-fit: cover;">
                </a>
            </div>
        
    </div>
</section>
<section class="section instagram-feed">
    <div class="container">
        <div class="row">
            <div class="title">
                <h2>View us on instagram</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="instagram-slider" id="instafeed" data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn"></div>
            </div>
        </div>
    </div>
</section>



@endsection
