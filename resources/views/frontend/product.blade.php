@extends('layouts.frontend')

@section('mainSection')
    <main class="main">
        <nav aria-label="breadcrumb" class="mb-0 border-0 breadcrumb-nav">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Products</a></li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">

                                        @foreach ($product->images as $image)
                                            <img id="product-zoom" src="{{ asset($image->image_name) }}"
                                                alt="{{ asset($product->name) }}"
                                                data-zoom-image="{{ asset($image->image_name) }}">
                                        @endforeach


                                    </figure>

                                    {{--
                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        <a class="product-gallery-item active" href="#"
                                            data-image="assets/images/products/single/1.jpg"
                                            data-zoom-image="assets/images/products/single/1-big.jpg">
                                            <img src="assets/images/products/single/1-small.jpg" alt="product side">
                                        </a>

                                        <a class="product-gallery-item" href="#"
                                            data-image="assets/images/products/single/2.jpg"
                                            data-zoom-image="assets/images/products/single/2-big.jpg">
                                            <img src="assets/images/products/single/2-small.jpg" alt="product cross">
                                        </a>

                                        <a class="product-gallery-item" href="#"
                                            data-image="assets/images/products/single/3.jpg"
                                            data-zoom-image="assets/images/products/single/3-big.jpg">
                                            <img src="assets/images/products/single/3-small.jpg" alt="product with model">
                                        </a>

                                        <a class="product-gallery-item" href="#"
                                            data-image="assets/images/products/single/4.jpg"
                                            data-zoom-image="assets/images/products/single/4-big.jpg">
                                            <img src="assets/images/products/single/4-small.jpg" alt="product back">
                                        </a>
                                    </div><!-- End .product-image-gallery -->
                                     --}}
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title"> {{ $product->name }}</h1><!-- End .product-title -->


                                <div class="ratings-container">
                                    {{-- to be implemented --}}
                                    {{-- <div class="ratings"> --}}
                                    {{-- <div class="ratings-val" style="width: 20%;"></div> --}}
                                    {{-- </div> --}}

                                    {{-- <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a> --}}
                                </div><!-- End .rating-container -->

                                <div class="product-price">
                                    ₦ {{ $product->price }}
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>
                                        {{ $product->short_description }}
                                    </p>
                                </div><!-- End .product-content -->

                                <!-- Vendor Contact Card -->
                                <div class="container"
                                    style="max-width: 450px; padding: 20px; margin: 30px auto; text-align: left; font-family: Arial, sans-serif; border-left: 4px solid #8fc74a;">
                                    <div class="contact-card">
                                        <!-- Vendor Name -->
                                        <h5 style="font-size: 22px; font-weight: bold; color: #333; margin-bottom: 10px;">
                                            {{ $product->company->name }}
                                        </h5>

                                        <!-- Vendor Position/Business Name -->
                                        <p style="font-size: 16px; color: #555; margin-bottom: 5px;">Vendor at AGii
                                            Marketplace</p>

                                        <!-- Availability -->
                                        {{-- <p style="font-size: 14px; color: #777; margin-bottom: 15px;">Business Name:
                                            <strong>MENA STORE</strong>
                                        </p> --}}

                                        <!-- Contact Information -->
                                        <div style="padding: 10px 0; margin-bottom: 15px;">
                                            <p style="font-size: 16px; color: #333; margin: 0; font-weight: bold;">Contact:
                                                {{ $product->company->phone_number }}
                                            </p>
                                            <p style="font-size: 14px; color: #555; margin: 5px 0;">Whatsapp:
                                                {{ $product->company->whatsapp }}</p>
                                            <p style="font-size: 14px; color: #555; margin: 0;">Website:
                                                {{ $product->company->website }}</p>
                                        </div>




                                        @php
                                            function formatPhoneNumber($phone)
                                            {
                                                // Remove all non-numeric characters
                                                $phone = preg_replace('/\D/', '', $phone);

                                                // Ensure it doesn't start with '0' and is in international format
                                                 if (substr($phone, 0, 1) == '0') {
                                                        $phone = '234' . substr($phone, 1); // Replace leading 0 with +234 (Nigeria example)
                                                }

                                                return $phone;
                                            }
                                        @endphp

                                        @if (!empty($product->company->whatsapp ))
                                            <a href="https://wa.me/{{ formatPhoneNumber($product->company->whatsapp ) }}"
                                                  style="background-color: #8fc74a; border: none; color: #ffffff; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: bold;"
                                            target="_blank"
                                                class="btn btn-success">
                                                <i class="fab fa-whatsapp"></i> Start Chat on Whatsapp
                                            </a>
                                        @endif



                                    </div>
                                </div>



                                <div class="product-details-footer">


                                    <div class="social-icons social-icons-sm">
                                        <span class="social-label">Share:</span>

                                        @php
                                            $productUrl = urlencode(route('home.product', $product->id));
                                            $productTitle = urlencode($product->name);
                                        @endphp

                                        <!-- Facebook Share -->
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $productUrl }}"
                                            class="social-icon" title="Facebook" target="_blank">
                                            <i class="icon-facebook-f"></i>
                                        </a>

                                        <!-- Twitter Share -->
                                        <a href="https://twitter.com/intent/tweet?url={{ $productUrl }}&text={{ $productTitle }}"
                                            class="social-icon" title="Twitter" target="_blank">
                                            <i class="icon-twitter"></i>
                                        </a>

                                        <!-- Instagram (Instagram doesn't support direct URL sharing) -->
                                        <a href="https://www.instagram.com/" class="social-icon" title="Instagram"
                                            target="_blank">
                                            <i class="icon-instagram"></i>
                                        </a>

                                        <!-- Pinterest Share -->
                                        <a href="https://pinterest.com/pin/create/button/?url={{ $productUrl }}&description={{ $productTitle }}"
                                            class="social-icon" title="Pinterest" target="_blank">
                                            <i class="icon-pinterest"></i>
                                        </a>
                                    </div>

                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 -->






                        {{-- <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">Dark yellow lace cut out swing dress</h1>
                                <!-- End .product-title -->

                                <div class="product-price">
                                    ₦84.00
                                </div><!-- End .product-price -->

                                <div class="product-content">
                                    <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus
                                        libero eu augue. Morbi purus libero, faucibus adipiscing. Sed lectus. </p>
                                </div><!-- End .product-content -->

                                <!-- Vendor Contact Card -->
                                <div class="container"
                                    style="max-width: 450px; padding: 20px; margin: 30px auto; text-align: left; font-family: Arial, sans-serif; border-left: 4px solid #8fc74a;">
                                    <div class="contact-card">
                                        <!-- Vendor Name -->
                                        <h5 style="font-size: 22px; font-weight: bold; color: #333; margin-bottom: 10px;">
                                            Igheya Goodluck</h5>

                                        <!-- Vendor Position/Business Name -->
                                        <p style="font-size: 16px; color: #555; margin-bottom: 5px;">Vendor at AGii
                                            Marketplace</p>

                                        <!-- Availability -->
                                        <p style="font-size: 14px; color: #777; margin-bottom: 15px;">Business Name:
                                            <strong>MENA STORE</strong>
                                        </p>

                                        <!-- Contact Information -->
                                        <div style="padding: 10px 0; margin-bottom: 15px;">
                                            <p style="font-size: 16px; color: #333; margin: 0; font-weight: bold;">Contact:
                                                +234 801 234 5678</p>
                                            <p style="font-size: 14px; color: #555; margin: 5px 0;">Email:
                                                goodluck@vendor.com</p>
                                            <p style="font-size: 14px; color: #555; margin: 0;">Location: Lagos, Nigeria</p>
                                        </div>

                                        <!-- Buttons -->
                                        <button class="btn btn-primary"
                                            style="background-color: #8fc74a; border: none; color: #ffffff; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: bold; margin-bottom: 10px;">
                                            Show More Details
                                        </button>
                                        <button class="btn btn-secondary"
                                            style="background-color: #6c757d; border: none; color: #ffffff; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: bold;">
                                            Start Chat
                                        </button>
                                    </div>
                                </div>



                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Women</a>,
                                        <a href="#">Dresses</a>,
                                        <a href="#">Yellow</a>
                                    </div><!-- End .product-cat -->

                                    <!--  <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div> -->
                                </div><!-- End .product-details-footer -->
                            </div><!-- End .product-details -->
                        </div><!-- End .col-md-6 --> --}}
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->


                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                            aria-labelledby="product-desc-link">
                            <div class="product-desc-content">
                                <h3>Product Information</h3>
                                {{ $product->description }}
                            </div><!-- End .product-desc-content -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->


                <div class="container my-4">
                    <div class="review-box">
                        <h4 class="mb-3 text-center">Customer Reviews</h4>
                        @if ($product->reviews->isEmpty())
                            <p class="text-center">No reviews yet. Be the first to review this product!</p>
                        @else
                            @foreach ($product->reviews as $review)
                                <div class="review">
                                    <strong>{{ $review->name }}</strong>
                                    {{-- ({{ $review->rating }}/5) --}}
                                    <p>{{ $review->review }}</p>
                                </div>
                            @endforeach
                        @endif
                        <br>
                        <h6 class="mb-3">Leave a Review</h6>
                        @if (auth()->user())
                            <div class="mb-3 shadow-sm card review-card">
                                <div class="card-body">

                                    <form method="POST" action="{{ route('reviews.store', $product->id) }}">
                                        @csrf
                                        <div class="d-none">
                                            <label>Rating (1-5)</label>
                                            <select name="rating" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label>Review</label>
                                            <textarea name="review" class="form-control" required></textarea>
                                        </div>
                                        <button class="btn btn-primary w-100 btn-lg" type="submit">Submit Review</button>
                                    </form>



                                </div>
                            </div>
                        @else
                            <p class="text-center fs-1"><a href="{{ route('login') }}">Login</a> to leave a review.</p>
                        @endif
                        <!-- Review Form -->

                    </div>
                </div>

                <!-- Safety Tips -->
                <div class="mt-4 safety-tips">
                    <h5>Safety Tips</h5>
                    <ul>
                        <li>Avoid sending any prepayments.</li>
                        <li>Meet with the seller at a safe public place.</li>
                        <li>Inspect what you're going to buy to make sure it's what you need.</li>
                        <li>Check all the documents and only pay if you're satisfied.</li>
                    </ul>
                </div>
                <h2 class="mb-4 text-center title">You May Also Like</h2><!-- End .title text-center -->
                <div class="row cat-banner-row clothing">
                    @foreach ($relatedProducts as $index => $product)
                        <!-- Start a new row every 4 relatedProducts -->

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

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
