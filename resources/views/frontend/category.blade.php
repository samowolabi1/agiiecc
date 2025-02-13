@extends('layouts.frontend')

@section('mainSection')
    <main class="main">
        <div class="text-center page-header" style="background-image: url('frontend/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Product</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="mb-2 breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="category.html">All Items</a></li>

                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">

                        <div class="mb-3 products">
                            <div class="row justify-content-center">

                                @if ($products->count() > 0)
                                    @foreach ($products as $index => $product)
                                        <div class="col-6 col-md-4 col-lg-4">
                                            <div class="text-center product product-7">
                                                <figure class="product-media">
                                                    <a href="{{ route('home.product', $product->id) }}">

                                                        @foreach ($product->images as $image)
                                                            <img src="{{ asset($image->image_name) }}" alt="Product Image">
                                                        @endforeach
                                                    </a>
                                                </figure>
                                                <div class="text-center product">

                                                    <div class="product-body">
                                                        <h3 class="product-title">
                                                            <div class="product-cat">
                                                                <a href="#" class="disabled">
                                                                    {{ $product->type->name ?? 'N/A' }} </a>

                                                            </div>
                                                            <a
                                                                href="{{ route('home.product', $product->id) }}">{{ $product->name }}</a>
                                                        </h3>
                                                        <div class="product-price">₦{{ number_format($product->price, 2) }}
                                                        </div>

                                                    </div>
                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 col-lg-4 -->
                                    @endforeach
                                @else
                                      <div class="p-5">
                                        <p class="p-5 fs-1 text-bg-danger"><b>No item available</b></p>
                                      </div>
                                @endif

                            </div><!-- End .row -->
                        </div><!-- End .products -->

                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3 order-lg-first">
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filters:</label>
                                <a href="/category" class="sidebar-filter-clear">Clean All</a>
                            </div><!-- End .widget widget-clean -->

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                        aria-controls="widget-1">
                                        Category
                                    </a>
                                </h3><!-- End .widget-title -->

                                <form method="GET" action="{{ route('home.category') }}">
                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                @foreach ($type as $ty)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="category[]"
                                                                value="{{ $ty->id }}" class="custom-control-input"
                                                                id="cat-{{ $ty->id }}"
                                                                {{ request()->has('category') && in_array($ty->id, request()->category) ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="cat-{{ $ty->id }}">{{ $ty->name }}</label>
                                                        </div><!-- End .custom-checkbox -->
                                                    </div>
                                                @endforeach
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->

                                    <div class="widget widget-collapsible">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                                aria-controls="widget-5">
                                                Price
                                            </a>
                                        </h3><!-- End .widget-title -->

                                        <div class="collapse show" id="widget-5">
                                            <div class="widget-body">
                                                <div class="filter-price">
                                                    <div class="filter-price-text">
                                                        Price Range:
                                                        <span id="filter-price-range">
                                                            {{ request()->min_price ?? 0 }} - {{ request()->max_price ?? 10000 }}
                                                        </span>
                                                    </div><!-- End .filter-price-text -->

                                                    <input type="hidden" name="min_price" id="min_price" value="{{ request()->min_price ?? 0 }}">
                                                    <input type="hidden" name="max_price" id="max_price" value="{{ request()->max_price ?? 10000 }}">

                                                    <div id="price-slider"></div><!-- End #price-slider -->
                                                </div><!-- End .filter-price -->
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                                </form>



                            </div><!-- End .sidebar sidebar-shop -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var slider = document.getElementById('price-slider');

            noUiSlider.create(slider, {
                start: [{{ request()->min_price ?? 0 }}, {{ request()->max_price ?? 10000 }}],
                connect: true,
                range: {
                    'min': 0,
                    'max': 10000
                }
            });

            slider.noUiSlider.on('update', function(values) {
                document.getElementById('filter-price-range').innerText = values[0] + " - " + values[1];
                document.getElementById('min_price').value = values[0];
                document.getElementById('max_price').value = values[1];
            });
        });
    </script>
@endsection
