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
                    <div class="widget widget-category">
                        <h4 class="widget-title"></h4>
                        <ul class="widget-category-list">
                            <li><a href="{{ route('new.advert') }}">New Advert</a>
                            </li>
                            <li><a href="#!">Running Adverts</a>
                            </li>
                            <li><a href="#!">All Adverts</a>
                            </li>
                            <li><a href="#!">Payments</a>
                            </li>
                        </ul>
                    </div> <!-- End category  -->

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
                            <form action="{{ route('createadsproduct') }}" method="post" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group col-md-12">
                                    <label class="control-label">Product Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="A descriptive Name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Product Short Description</label>
                                        <input type="text" name="short_description" class="form-control"
                                            placeholder="Short Description" value="{{ old('short_description') }}" required>
                                        @if ($errors->has('short_description'))
                                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Product Description</label>
                                        <input type="text" name="description" class="form-control"
                                            placeholder="Long  Description" value="{{ old('description') }}" required>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Product Category</label>
                                        <select class="form-control" name="ProductCategory" required >
                                            <option selected>Pick a product category</option>
                                            @foreach ($type as $ty)
                                                <option value="{{ $ty->id }}">{{ $ty->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('ty_id'))
                                            <span class="text-danger">Category is required</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Product Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="24000"
                                            value="{{ old('price') }}" required>
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Product Color</label><br>
                                        <div class="btn-group" role="group"
                                            aria-label="Basic checkbox toggle button group">
                                            @foreach ($color as $cl)
                                                <input value="{{ $cl->id }}" type="checkbox" name="color_id[]"
                                                    class="btn-check" id="cl{{ $cl->id }}" autocomplete="off">
                                                <label class="btn btn-outline-primary"
                                                    for="cl{{ $cl->id }}">{{ $cl->name }}</label>
                                                &nbsp;&nbsp; <br>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Product Size</label><br>
                                        <div class="btn-group" role="group"
                                            aria-label="Basic checkbox toggle button group">
                                            @foreach ($size as $sz)
                                                <input value="{{ $sz->id }}" type="checkbox" name="ProductSize[]"
                                                    class="btn-check" id="{{ $sz->id }}" autocomplete="off">
                                                <label class="btn btn-outline-primary"
                                                    for="{{ $sz->id }}">{{ $sz->name }}</label>
                                                &nbsp;&nbsp;
                                            @endforeach
                                        </div>
                                    </div>

                                </div> <br>
                                <input type="hidden" name="userId" value="{{ auth()->user()->id }}">

                                <button type="submit" class="btn btn-primary">NEXT</button>

                            </form>
                        </div>

                    </div>





                </div>




            </div>


    </section>
    <!-- JavaScript to Toggle Forms -->

@endsection
