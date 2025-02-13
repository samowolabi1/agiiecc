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
                            <form action="{{ route('vendor_create_service') }}" method="post" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group col-md-12">
                                    <label class="control-label">Service Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="A descriptive Name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Short Short Description</label>
                                        <input type="text" name="short_description" class="form-control"
                                            placeholder="Short Description" value="{{ old('short_description') }}" required>
                                        @if ($errors->has('short_description'))
                                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Service Description</label>
                                        <input type="text" name="description" class="form-control"
                                            placeholder="Long  Description" value="{{ old('description') }}" required>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Service Category</label>
                                        <select class="form-control" name="servicetype_id" required>
                                            <option selected>Pick a service category</option>
                                            @foreach ($servicetypes as $ty)
                                                <option value="{{ $ty->id }}">{{ $ty->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('ty_id'))
                                            <span class="text-danger">Category is required</span>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label">Service Cost</label>
                                        <input type="number" name="price" class="form-control" placeholder="24000"
                                            value="{{ old('price') }}" required>
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>

                                </div>
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
