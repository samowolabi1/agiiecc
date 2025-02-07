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
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Products</a></li>
                </ol>

                {{-- <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav --> --}}
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
                                        {{-- <img id="product-zoom" src="/frontend/assets/images/products/single/1.jpg"
                                            data-zoom-image="assets/images/products/single/1-big.jpg" alt="product image"> --}}
                                        @foreach ($product->images as $image)
                                            <img id="product-zoom" src="{{ asset($image->image_name) }}"
                                                alt="{{ asset($product->name) }}"
                                                data-zoom-image="{{ asset($image->image_name) }}">
                                        @endforeach

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure>

                                    <!-- End .product-main-image -->
                                    {{--
                                    <div id="product-zoom-gallery" class="product-image-gallery">

                                        @foreach ($product->images as $image)

                                            <a class="product-gallery-item active" href="#"
                                                data-image="{{ asset($image->image_name) }}"
                                                data-zoom-image="{{ asset($image->image_name) }}">
                                                <img src="{{ asset($image->image_name) }}"
                                                    alt="{{ asset($product->name) }}">
                                            </a>
                                        @endforeach




                                        <a class="product-gallery-item" href="#"
                                            data-image="assets/images/products/single/2.jpg"
                                            data-zoom-image="assets/images/products/single/2-big.jpg">
                                            <img src="/frontend/assets/images/products/single/2-small.jpg"
                                                alt="product cross">
                                        </a>

                                        <a class="product-gallery-item" href="#"
                                            data-image="assets/images/products/single/3.jpg"
                                            data-zoom-image="assets/images/products/single/3-big.jpg">
                                            <img src="/frontend/assets/images/products/single/3-small.jpg"
                                                alt="product with model">
                                        </a>

                                        <a class="product-gallery-item" href="#"
                                            data-image="assets/images/products/single/4.jpg"
                                            data-zoom-image="assets/images/products/single/4-big.jpg">
                                            <img src="/frontend/assets/images/products/single/4-small.jpg"
                                                alt="product back">
                                        </a>
                                    </div> --}}


                                    <!-- End .product-image-gallery -->
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

                                <div class="details-filter-row details-row-size">
                                    <label>Color:</label>

                                    <div class="product-nav product-nav-thumbs">
                                        <a href="#" class="active">
                                            <img src="/frontend/assets/images/products/single/1-thumb.jpg"
                                                alt="product desc">
                                        </a>
                                        <a href="#">
                                            <img src="/frontend/assets/images/products/single/2-thumb.jpg"
                                                alt="product desc">
                                        </a>
                                    </div>
                                </div>






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

                                        <!-- Buttons -->
                                        {{-- <button class="btn btn-primary"
                                            style="background-color: #8fc74a; border: none; color: #ffffff; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: bold; margin-bottom: 10px;">
                                            Show More Details
                                        </button> --}}

                                        <button class="btn btn-secondary"
                                            style="background-color: #8fc74a; border: none; color: #ffffff; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: bold;">
                                            Start Chat
                                        </button>
                                    </div>
                                </div>



                                <div class="product-details-footer">
                                    {{-- <div class="product-cat">
                                        <span>Category:</span>
                                        <a href="#">Women</a>,
                                        <a href="#">Dresses</a>,
                                        <a href="#">Yellow</a>
                                    </div> --}}

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
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->

                <div class="product-details-tab">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                role="tab" aria-controls="product-info-tab" aria-selected="false"> Bio Details </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
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

                        {{-- bio data --}}
                        {{-- <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                            aria-labelledby="product-info-link">
                            <div class="product-desc-content">
                                <h3>Information</h3>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat
                                    mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper
                                    suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam
                                    porttitor mauris sit amet orci. </p>

                                <h3>Fabric & care</h3>
                                <ul>
                                    <li>Faux suede fabric</li>
                                    <li>Gold tone metal hoop handles.</li>
                                    <li>RI branding</li>
                                    <li>Snake print trim interior </li>
                                    <li>Adjustable cross body strap</li>
                                    <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                                </ul>

                                <h3>Size</h3>
                                <p>one size</p>
                            </div>
                        </div> --}}

                        <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                            aria-labelledby="product-review-link">
                            <div class="reviews">
                                <h3>Reviews (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Good, perfect size</h4>

                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                                    dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                                    atque blanditiis commodi perspiciatis doloremque, possimus, explicabo,
                                                    autem fugit beatae quae voluptas!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis
                                                    laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi,
                                                    quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->


                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->
                <!-- Safety Tips -->
                <div class="safety-tips mt-4">
                    <h5>Safety Tips</h5>
                    <ul>
                        <li>Avoid sending any prepayments.</li>
                        <li>Meet with the seller at a safe public place.</li>
                        <li>Inspect what you're going to buy to make sure it's what you need.</li>
                        <li>Check all the documents and only pay if you're satisfied.</li>
                    </ul>
                </div>
                <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
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
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            {{-- <div class="ratings-val" style="width: {{ $product->ratings() }}%;"></div> --}}
                                        </div>
                                        <span class="ratings-text">({{ $product->reviews_count }} Reviews)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>



            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
