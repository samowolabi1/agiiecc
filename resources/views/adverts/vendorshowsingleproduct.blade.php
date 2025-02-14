@extends('layouts.frontend')
@section('mainSection')

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="m-3 row">
                <div class="mt-3 text-center col-md-12">
                    @include('partials.userdshheader')

{{--
                    <div class="dashboard-wrapper user-dashboard">
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
                    <h3><b> {{ session('category_name') }} Advert</b></h3>
                    <br>
                    <div class="card-body">

                        <div class="col-md-12">
                            @if (!empty($product))

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
                                        <table style="border:0px;" class="table table-hover">
                                            <tr>
                                                <td style="border:0px;"><strong>Product Name: </strong></td>
                                                <td style="border:0px;">{{ $product->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;"><strong>Description: </strong></td>
                                                <td style="border:0px;">{{ $product->short_description ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;"><strong>Full Description: </strong></td>
                                                <td style="border:0px;">{{ $product->description ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;"><strong>Price: </strong></td>
                                                <td style="border:0px;">&#x20a6;{{ number_format($product->price ?? 0) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;"><strong>Product Category: </strong></td>
                                                <td style="border:0px;">{{ $product->type->name ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;"><strong>Date Created: </strong></td>
                                                <td style="border:0px;">
                                                    {{ $product->created_at->isoFormat('MMMM Do YYYY') }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;"><strong>Approved: </strong></td>
                                                <td style="border:0px;">{{ $product->approved ?? '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px;" class="text-primary"><strong>Created By</strong>
                                                </td>
                                                <td style="border:0px;" class="text-primary">
                                                    {{ $product->created_by ?? '' }}</td>
                                            </tr>
                                        </table>
                                        {{-- <button id="editBtn" class="btn btn-primary">Edit</button> --}}
                                    </div>

                                    <!-- Edit Form -->
                                    <div id="editForm" style="display: none;">
                                        <form action="{{ route('products.update', $product->id ?? '') }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $product->name ?? '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Short Description</label>
                                                <input type="text" class="form-control" name="short_description"
                                                    value="{{ $product->short_description ?? '' }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Long Description</label>
                                                <textarea class="form-control" name="description">{{ $product->description ?? '' }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Price</label>
                                                <input type="number" class="form-control" name="price"
                                                    value="{{ $product->price ?? 0 }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Product Category</label>
                                                <select class="form-control" name="ProductCategory" required>
                                                    <option selected>Pick a product category</option>
                                                    @foreach ($type as $ty)
                                                        <option value="{{ $ty->id }}">{{ $ty->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Product Color</label><br>
                                                @foreach ($color as $cl)
                                                    <input value="{{ $cl->id }}" type="checkbox" name="color_id[]"
                                                        class="btn-check" id="cl{{ $cl->id }}" autocomplete="off">
                                                    <label class="btn btn-outline-primary"
                                                        for="cl{{ $cl->id }}">{{ $cl->name }}</label>
                                                    &nbsp;&nbsp; <br>
                                                @endforeach
                                            </div>

                                            <div class="form-group">
                                                <label>Product Size</label><br>
                                                @foreach ($size as $sz)
                                                    <input value="{{ $sz->id }}" type="checkbox" name="ProductSize[]"
                                                        class="btn-check" id="{{ $sz->id }}" autocomplete="off">
                                                    <label class="btn btn-outline-primary"
                                                        for="{{ $sz->id }}">{{ $sz->name }}</label>
                                                    &nbsp;&nbsp;
                                                @endforeach
                                            </div>

                                            <br>
                                            <button type="submit" class="btn btn-success">Save</button>
                                            <button type="button" id="cancelBtn" class="btn btn-secondary">Cancel</button>
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
