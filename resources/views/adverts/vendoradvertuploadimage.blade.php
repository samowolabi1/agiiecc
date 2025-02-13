@extends('layouts.master')

@section('content')
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="m-3 row">
                <div class="col-md-12">
                    @include('partials.userdshheader')


                    <div class="dashboard-wrapper user-dashboard">
                        <div class="media">

                            <div class="media-body">
                                <h2 class="media-heading">My Adverts </h2>
                                <!-- <p>Created - 2 Years Ago || Last Login - 2 Days ago </p> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div style="height: 40px;"></div>

            <div class="m-3 row">
                <div class="col-md-2">
                    <!-- Widget Category -->
                    @include('adverts.sidebar.sidebar')

                </div>

                <div class="col-md-10">
                    <h3><b> {{ session('category_name') }} Advert</b></h3>

                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ $service === 'uploadingService' ? route('ride_uploadImages') : route('product_uploadImages') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
                            @csrf
                                <h4 class="mb-4">Upload Product Images</h4>
                                <div class="mb-3">
                                    <label for="images" class="form-label">Select Up to 4 Images</label>
                                    <input
                                        type="file"
                                        name="images[]"
                                        id="images"
                                        class="form-control"
                                        multiple
                                        required
                                        accept="image/*"
                                        onchange="validateFileLimit(this)"
                                    >
                                    <small class="form-text text-muted">
                                        You can upload up to 4 images (jpeg, png, jpg, gif). Each file should not exceed 2MB.
                                    </small>
                                </div>
                                <div id="file-error" class="mt-2 text-danger small d-none">
                                    You can only upload up to 4 images. Please remove excess files.
                                </div>

                                <input type="hidden" name="userId" value="{{$user->id}}">
                                <input type="hidden" name="productId" value="{{$productId}}">
                                 <input type="hidden" name="itemId" value="{{$itemId}}">
                                <button type="submit" class="mt-3 btn btn-primary w-100">Upload Images</button>
                            </form>

                        </div>

                    </div>





                </div>




            </div>


    </section>
    <!-- JavaScript to Toggle Forms -->

@endsection
