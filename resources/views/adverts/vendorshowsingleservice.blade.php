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
                    <h3><b> {{ session('category_name') }} Advert</b></h3>
                    <br>
                    <div class="card-body">

                        <div class="col-md-12">
                            @if (!empty($service))



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


                                <div class="mt-4 col-md-12">
                                    <button id="editBtn" class="btn btn-primary btn-lg">Edit</button>

                                    <!-- Display Table -->
                                    <div id="productTable">
                                        <div class="col-md-12">

                                            <table style="border:0px;" class="table table-hover">

                                                <tr>
                                                    <td style="border:0px;"><strong>Service Name: </strong></td>
                                                    <td style="border:0px;">{{ $service->name ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="border:0px;"><strong>Description: </strong></td>
                                                    <td style="border:0px;">{{ $service->short_description ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="border:0px;"><strong>Full Description: </strong></td>
                                                    <td style="border:0px;">{{ $service->description ?? '' }}</td>
                                                </tr>

                                                <tr>
                                                    <td style="border:0px;"><strong>Price: </strong></td>
                                                    <td style="border:0px;">
                                                        &#x20a6;{{ number_format($service->price ?? '') }}</td>
                                                </tr>


                                                <tr>
                                                    <td style="border:0px;"><strong>Service Category: </strong></td>
                                                    <td style="border:0px;">{{ $service->sevicetype->name ?? '' }}</td>
                                                </tr>

                                                <tr>
                                                    <td style="border:0px;"><strong>Date Created: </strong></td>
                                                    <td style="border:0px;">
                                                        {{ $service->created_at->isoFormat('MMMM Do YYYY') }}</td>
                                                </tr>

                                                <tr>
                                                    <td style="border:0px;"><strong>Status: </strong></td>
                                                    <td style="border:0px;">{{ $service->status ?? '' }}</td>
                                                </tr>

                                                <tr>
                                                    <td style="border:0px;"><strong>Approved: </strong></td>
                                                    <td style="border:0px;">{{ $service->approved ?? '' }}</td>
                                                </tr>

                                                <tr>
                                                    <td style="border:0px;" class="text-primary"><strong>Created By</strong>
                                                    </td>
                                                    <td style="border:0px;" class="text-primary">
                                                        {{ $service->created_by ?? '' }}</td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>

                                    <!-- Edit Form -->
                                    <div id="editForm" style="display: none;">
                                        <form action="{{route('updateService', $service->id)}}" method="POST">
                                            @csrf


                                            <div class="form-group">
                                                <label for="name"><strong>Service Name:</strong></label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name', $service->name ?? '') }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="short_description"><strong>Short Description:</strong></label>
                                                <textarea class="form-control" name="short_description" required>{{ old('short_description', $service->short_description ?? '') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="description"><strong>Full Description:</strong></label>
                                                <textarea class="form-control" id="editor" name="description" required>{{ old('description', $service->description ?? '') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="price"><strong>Price (₦):</strong></label>
                                                <input type="number" class="form-control" name="price" value="{{ old('price', $service->price ?? '') }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="sevicetype_id"><strong>Service Category:</strong></label>
                                                <select class="form-control" name="sevicetype_id" required>
                                                    <option value="">Select Category</option>
                                                    @foreach($serviceTypes as $type)
                                                        <option value="{{ $type->id }}" {{ isset($service) && $service->sevicetype_id == $type->id ? 'selected' : '' }}>
                                                            {{ $type->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="status"><strong>Status:</strong></label>
                                                <select class="form-control" name="status" required>
                                                    <option value="active" {{ isset($service) && $service->status == 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ isset($service) && $service->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>


                                            {{-- <div class="form-group">
                                                <label for="created_by"><strong>Created By:</strong></label>
                                                <input type="text" class="form-control" name="created_by" value="{{ old('created_by', $service->created_by ?? '') }}" readonly>
                                            </div> --}}

                                            <button type="submit" class="btn btn-primary">
                                                {{ isset($service) ? 'Update Service' : 'Create Service' }}
                                            </button>
                                        </form>

                                        <!-- CKEditor Script -->
                                        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
                                        <script>
                                            CKEDITOR.replace('editor', {
                                                height: 300
                                            });
                                        </script>


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











                            @endif

                        </div>

                    </div>





                </div>




            </div>


    </section>
    <!-- JavaScript to Toggle Forms -->

@endsection
