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
                    <div class="card-body">

                        <div class="col-md-12">
                            @if (!empty($user->products))
                                <h3><b>Product Advert</b></h3>
                                <div class="p-3 table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Short Description</th>
                                                {{-- <th>Type</th> --}}
                                                {{-- <th>Status</th> --}}
                                                <th>Approved</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Prod ID</th>
                                                <th>Name</th>
                                                <th>Short Description</th>
                                                {{-- <th>Type</th> --}}
                                                {{-- <th>Status</th> --}}
                                                <th>Approved</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($products as $indexKey => $pdt)
                                                <tr>
                                                    <td>{{ ++$indexKey }}</td>
                                                    <td>{{ $pdt->name }} </< /td>
                                                    <td>{{ $pdt->short_description }}</< /td>
                                                        {{-- <td>{{$pdt->type_id}}</td> --}}
                                                        {{-- <td>{{$pdt->status}}</</td> --}}
                                                    <td>{{ $pdt->approved }}</< /td>
                                                    <td>{{ $pdt->created_at->isoFormat('MMMM Do YYYY') }}</td>
                                                    <td><a href="{{ route('show_single_ads', $pdt->id) }}">Show Product</a><i
                                                            class="fab fa-view-f fa-fw"></i></td>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <P>Vendor has no Products</P>
                            @endif

                        </div>

                        <div class="col-md-12">
                            @if (!empty($user->services))
                                <h3><b>Service Advert</b></h3>
                                <div class="p-3 table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Short Description</th>
                                                {{-- <th>Type</th> --}}
                                                {{-- <th>Status</th> --}}
                                                <th>Approved</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Prod ID</th>
                                                <th>Name</th>
                                                <th>Short Description</th>
                                                {{-- <th>Type</th> --}}
                                                {{-- <th>Status</th> --}}
                                                <th>Approved</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($services as $indexKey => $pdt)
                                                <tr>
                                                    <td>{{ ++$indexKey }}</td>
                                                    <td>{{ $pdt->name }} </< /td>
                                                    <td>{{ $pdt->short_description }}</< /td>
                                                        {{-- <td>{{$pdt->type_id}}</td> --}}
                                                        {{-- <td>{{$pdt->status}}</</td> --}}
                                                    <td>{{ $pdt->approved }}</< /td>
                                                    <td>{{ $pdt->created_at->isoFormat('MMMM Do YYYY') }}</td>
                                                    <td><a href="{{ route('show_single_ads', $pdt->id) }}">Show
                                                            Service</a><i class="fab fa-view-f fa-fw"></i></td>

                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            @else
                                {{-- <P>Vendor has no Products</P> --}}
                            @endif

                        </div>

                        <div class="col-12 ">

                            @if (!empty($user->rides))
                            <h3><b>Ride Advert</b></h3>
                            <div class="p-3 table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            {{-- <th>Short Description</th> --}}
                                            {{-- <th>Type</th> --}}
                                            {{-- <th>Status</th> --}}
                                            <th>Approved</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Prod ID</th>
                                            <th>Name</th>
                                            {{-- <th>Short Description</th> --}}
                                            {{-- <th>Type</th> --}}
                                            {{-- <th>Status</th> --}}
                                            <th>Approved</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($rides as $indexKey => $pdt)
                                            <tr>
                                                <td>{{ ++$indexKey }}</td>
                                                <td>{{ $pdt->name }} </td>
                                                {{-- <td>{{ $pdt->short_description }}</td> --}}
                                                    {{-- <td>{{$pdt->type_id}}</td> --}}
                                                    {{-- <td>{{$pdt->status}}</</td> --}}
                                                <td>{{ $pdt->approved }}</td>
                                                <td>{{ $pdt->created_at->isoFormat('MMMM Do YYYY') }}</td>
                                                <td><a href="{{ route('show_single_ads_ride', $pdt->id) }}">Show
                                                        Ride</a><i class="fab fa-view-f fa-fw"></i></td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        @else
                            {{-- <P>Vendor has no Products</P> --}}
                        @endif


                        </div>

                    </div>





                </div>




            </div>


    </section>
    <!-- JavaScript to Toggle Forms -->

@endsection
