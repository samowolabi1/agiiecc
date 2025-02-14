@extends('layouts.frontend')
@section('mainSection')

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="m-3 row">
                <div class="mt-3 text-center col-md-12">
                    @include('partials.userdshheader')


                    {{-- <div class="dashboard-wrapper user-dashboard">
                        <div class="media">

                            <div class="media-body">
                                <h2 class="media-heading">My Adverts </h2>
                                <!-- <p>Created - 2 Years Ago || Last Login - 2 Days ago </p> -->
                            </div>
                        </div>

                    </div> --}}
                </div>
            </div>


            <div style="height: 40px;"></div>

            <div class="m-3 row">
                <div class="col-md-2">
                    <!-- Widget Category -->
                    @include('adverts.sidebar.sidebar')
                </div>

                <div class="col-md-10">
                    {{-- <h3><b> {{ session('category_name') }} Advert</b></h3> --}}
                    <br>
                    <div class="card-body">

                        <div class="col-md-12">
                            @if (!empty($ride))


                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                <div class="col-md-12">
                                    <button id="editBtn" class="btn btn-primary btn-lg">Edit</button>

                                    <!-- Display Table -->
                                    <div id="productTable">
                                        <h3><b>Ride Details</b></h3>
                                        <table class="table table-hover">
                                            <tr><td><strong>Ride Name:</strong></td><td>{{ $ride->name ?? '' }}</td></tr>
                                            {{-- <tr><td><strong>Slug:</strong></td><td>{{ $ride->slug ?? '' }}</td></tr> --}}

                                            <tr><td><strong>Full Address:</strong></td><td>{{ $ride->full_address ?? '' }}</td></tr>
                                            <tr><td><strong>Price:</strong></td><td>&#x20A6;{{ number_format($ride->price ?? 0) }}</td></tr>
                                            <tr><td><strong>Discount:</strong></td><td>{{ $ride->discount ?? 0 }}%</td></tr>
                                            <tr><td><strong>Ride Type:</strong></td><td>{{ $ride->ridetype->name ?? '' }}</td></tr>
                                            <tr><td><strong>Car Brand:</strong></td><td>{{ $ride->carbrand->name ?? '' }}</td></tr>
                                            <tr><td><strong>Car Type:</strong></td><td>{{ $ride->cartype->name ?? '' }}</td></tr>
                                            <tr><td><strong>Car Color:</strong></td><td>{{ $ride->color->name ?? '' }}</td></tr>
                                            <tr><td><strong>Car Plate Number:</strong></td><td>{{ $ride->car_plate_number ?? '' }}</td></tr>
                                            <tr><td><strong>Car Engine Number:</strong></td><td>{{ $ride->car_engine_number ?? '' }}</td></tr>
                                            <tr><td><strong>License Number:</strong></td><td>{{ $ride->license_number ?? '' }}</td></tr>
                                            <tr><td><strong>Next of Kin Name:</strong></td><td>{{ $ride->next_of_kin_name ?? '' }}</td></tr>
                                            <tr><td><strong>Next of Kin Phone:</strong></td><td>{{ $ride->next_of_kin_phone_number ?? '' }}</td></tr>
                                            <tr><td><strong>Date Created:</strong></td><td>{{ $ride->created_at->isoFormat('MMMM Do YYYY') }}</td></tr>

                                            <tr><td><strong>Approved:</strong></td><td>{{ $ride->approved ? 'Yes' : 'No' }}</td></tr>
                                        </table>
                                        {{-- <button id="editBtn" class="btn btn-primary">Edit</button> --}}
                                    </div>

                                    <!-- Edit Form -->
                                    <div id="editForm" style="display: none;">
                                        <form action="{{ route('storeOrUpdate', $ride->id) }}" method="POST">
                                            @csrf
                                            @if(isset($ride)) @method('PUT') @endif

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="name">Ride Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ $ride->name ?? '' }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="slug">Slug</label>
                                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ $ride->slug ?? '' }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="short_description">Short Description</label>
                                                    <textarea name="short_description" id="short_description" class="form-control">{{ $ride->short_description ?? '' }}</textarea>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="full_address">Full Address</label>
                                                    <input type="text" name="full_address" id="full_address" class="form-control" value="{{ $ride->full_address ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="price">Price</label>
                                                    <input type="number" name="price" id="price" class="form-control" value="{{ $ride->price ?? '' }}" required>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="discount">Discount (%)</label>
                                                    <input type="number" name="discount" id="discount" class="form-control" value="{{ $ride->discount ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="service_link">Service Link</label>
                                                    <input type="text" name="service_link" id="service_link" class="form-control" value="{{ $ride->service_link ?? '' }}">
                                                </div>


                                                <div class="col-md-6">
                                                    <label for="tags">Tags</label>
                                                    <input type="text" name="tags" id="tags" class="form-control" value="{{ $ride->tags ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="ridetype_id">Ride Type</label>
                                                    <select name="ridetype_id" id="ridetype_id" class="form-control">
                                                        @foreach($rideTypes as $type)
                                                            <option value="{{ $type->id }}" {{ isset($ride) && $ride->ridetype_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="color_id">Color</label>
                                                    <select name="color_id" id="color_id" class="form-control">
                                                        @foreach($colors as $color)
                                                            <option value="{{ $color->id }}" {{ isset($ride) && $ride->color_id == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="carbrand_id">Car Brand</label>
                                                    <select name="carbrand_id" id="carbrand_id" class="form-control">
                                                        @foreach($carBrands as $brand)
                                                            <option value="{{ $brand->id }}" {{ isset($ride) && $ride->carbrand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="cartype_id">Car Type</label>
                                                    <select name="cartype_id" id="cartype_id" class="form-control">
                                                        @foreach($carTypes as $type)
                                                            <option value="{{ $type->id }}" {{ isset($ride) && $ride->cartype_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="car_plate_number">Car Plate Number</label>
                                                    <input type="text" name="car_plate_number" id="car_plate_number" class="form-control" value="{{ $ride->car_plate_number ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="car_engine_number">Car Engine Number</label>
                                                    <input type="text" name="car_engine_number" id="car_engine_number" class="form-control" value="{{ $ride->car_engine_number ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="license_number">License Number</label>
                                                    <input type="text" name="license_number" id="license_number" class="form-control" value="{{ $ride->license_number ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="next_of_kin_name">Next of Kin Name</label>
                                                    <input type="text" name="next_of_kin_name" id="next_of_kin_name" class="form-control" value="{{ $ride->next_of_kin_name ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="next_of_kin_address">Next of Kin Address</label>
                                                    <input type="text" name="next_of_kin_address" id="next_of_kin_address" class="form-control" value="{{ $ride->next_of_kin_address ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="next_of_kin_phone_number">Next of Kin Phone Number</label>
                                                    <input type="text" name="next_of_kin_phone_number" id="next_of_kin_phone_number" class="form-control" value="{{ $ride->next_of_kin_phone_number ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="spouse_name">Spouse Name</label>
                                                    <input type="text" name="spouse_name" id="spouse_name" class="form-control" value="{{ $ride->spouse_name ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="spouse_address">Spouse Address</label>
                                                    <input type="text" name="spouse_address" id="spouse_address" class="form-control" value="{{ $ride->spouse_address ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="spouse_phone_number">Spouse Phone Number</label>
                                                    <input type="text" name="spouse_phone_number" id="spouse_phone_number" class="form-control" value="{{ $ride->spouse_phone_number ?? '' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="active" {{ isset($ride) && $ride->status == 'active' ? 'selected' : '' }}>Active</option>
                                                        <option value="inactive" {{ isset($ride) && $ride->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </div>



                                                <div class="mt-3 col-md-12">
                                                    <button type="submit" class="btn btn-primary">{{ isset($ride) ? 'Update Ride' : 'Create Ride' }}</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    <script>
                                        document.getElementById("editBtn").addEventListener("click", function() {
                                            document.getElementById("productTable").style.display = "none";
                                            document.getElementById("editForm").style.display = "block";
                                        });

                                        document.getElementById("cancelBtn").addEventListener("click", function() {
                                            document.getElementById("editForm").style.display = "none";
                                            document.getElementById("productTable").style.display = "block";
                                        });
                                    </script>


                                </div>


                                    <hr>



                            @endif

                        </div>

                    </div>





                </div>




            </div>


    </section>
    <!-- JavaScript to Toggle Forms -->

@endsection
