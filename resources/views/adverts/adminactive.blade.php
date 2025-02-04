@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Active Adverts</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter"> Create New Vendor</a> -->
    </div>

    <div class="row m-3">

        <div class="col-md-12">
     <!--  -->

        <!-- Button trigger modal -->

<!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">


                               
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                  </div>
                </div>
              </div>
            </div>
     <!--  -->
                            
            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                              <!-- <h6 class="m-0 font-weight-bold text-primary">Staffs</h6> -->
                        </div>
                        <div class="card-body">
                            @if(!empty($activeAds) AND count($activeAds) >= 1)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Company</th>
                                            <th>Category</th>
                                            <th>Product</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                         <!--    <th>Approved</th>
                                            <th>Paid</th> -->
                                            <th>Action</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Company</th>
                                            <th>Category</th>
                                            <th>Product</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <!-- <th>Approved</th> -->
                                            <!-- <th>Paid</th> -->
                                            <th>Action</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($activeAds as $indexKey => $actads)
                                          <tr>
                                            <td>{{++$indexKey}}</td>
                                            <td>{{$actads->user->firstname ?? ''}} {{$inads->user->lastname ?? ''}}</</td>
                                            <td>{{$actads->user->email ?? ''}}</</td>
                                            <td>{{$actads->company->name ?? ''}}</</td>
                                            <td>{{$actads->category->name ?? ''}}</</td>
                                            @if($actads->category_id == 1)
                                                <td>{{$actads->product->name ?? ''}}</</td>
                                            @elseif($actads->category_id == 2)
                                                <td>{{$actads->service->name ?? ''}}</</td>
                                            @else
                                                <td>{{$actads->ride->name ?? ''}}</</td>
                                            @endif
                                            <td>{{$actads->created_at->isoFormat('MMMM Do YYYY') ?? ''}}</td>
                                            <td>{{$actads->status ?? ''}}</</td>
                                            <!-- <td>{{$actads->approved ?? ''}}</</td> -->
                                            <!-- <td>{{$actads->paid ?? ''}}</</td> -->
                                            <td><a href="{{route('vendor.show',$actads->user_id)}}">View Company</a><i class="fab fa-view-f fa-fw"></i></td>
                                            <td><a href="{{route('advert.show',$actads->id)}}">More Info</a><i class="fab fa-view-f fa-fw"></i></td>
                                             @if($actads->category_id == 1)
                                                <td><a href="{{route('admin.prod.show',$actads->product->id)}}">View Product</a><i class="fab fa-view-f fa-fw"></i></td>
                                            @elseif($actads->category_id == 2)
                                                <td><a href="{{route('admin.serv.show',$actads->service->id)}}">View Service</a><i class="fab fa-view-f fa-fw"></i></td>
                                            @else
                                                <td><a href="{{route('admin.ride.show',$actads->ride->id)}}">View Ride</a><i class="fab fa-view-f fa-fw"></i></td>
                                            @endif
                                            


                                          </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                            @else
                  <P>NO Active Adverts</P>
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