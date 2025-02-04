@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Services</h1>
        <!-- <a href="{{route('all.vendors')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> All Products</a> -->
    </div>

    <div class="row m-3">

    <div class="col-md-12">
     <!--  -->

        <!-- Button trigger modal -->

            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> <a href="{{route('all.services')}}" class="btn btn-sm btn-primary shadow-sm"> Products</a> &nbsp; : &nbsp; <a href="{{route('all.rides')}}" class="btn btn-sm btn-primary shadow-sm"> Rides</a></h6>
                </div>
                <div class="card-body">

                     @if(!empty($services))
                            <div class="table-responsive p-3">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Short Description</th>
                                            <th>Type</th>
                                            <th>Status</th>
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
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Approved</th>
                                            <th>Date Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($services as $indexKey => $serv)
                                          <tr>
                                            <td>{{++$indexKey}}</td>
                                            <td>{{$serv->name}} </</td>
                                            <td>{{$serv->short_description}}</</td>
                                            <td>{{$serv->sevicetype_id}}</td>
                                            <td>{{$serv->status}}</</td>
                                            <td>{{$serv->approved}}</</td>
                                            <td>{{$serv->created_at->isoFormat('MMMM Do YYYY')}}</td>                                          
                                            <td><a href="{{route('admin.serv.show',$serv->id)}}">Show Service</a><i class="fab fa-view-f fa-fw"></i></td>

                                          </tr>
                                        @endforeach
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                            @else
                  <P>Vendor has no Services</P>
                  @endif
                </div>
            </div>                   

        </div>


    </div>

   

    <!-- Content Row -->
    

</div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->
@endsection