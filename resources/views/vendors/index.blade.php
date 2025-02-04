@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Vendors</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter"> Create New Vendor</a>
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


                                 <form action="{{route('create.vendor')}}" method="post">
                                     @csrf
                              

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Firstname</label>
                                        <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="{{ old('firstname') }}" required>
                                            @if ($errors->has('firstname'))
                                              <span class="text-danger">{{$errors->first('firstname')}}</span> 
                                            @endif 
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Lastname</label>
                                        <input type="text" name="lastname" class="form-control" placeholder="Lasttname" value="{{ old('lastname') }}" required>
                                            @if ($errors->has('lastname'))
                                              <span class="text-danger">{{$errors->first('lastname')}}</span> 
                                            @endif 
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Gender</label>
                                        <select class="form-control" name="sex" required>
                                            <option selected>Pick a gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        
                                        </select>
                                          @if ($errors->has('sex'))
                                            <span class="text-danger">Gender is required</span> 
                                          @endif 
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                              <span class="text-danger">{{$errors->first('email')}}</span> 
                                            @endif 
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Default Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}" required>
                                            @if ($errors->has('password'))
                                              <span class="text-danger">{{$errors->first('password')}}</span> 
                                            @endif 
                                    </div>

                                                                                             


                            </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                          

                                     <button style="margin-left: 15px;" type="submit" class="btn btn-primary">Submit</button>
                                 
                        </form>
                  
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
                            @if(!empty($users) AND count($users) >= 1)
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <!-- <th>Phone Number</th> -->
                                            <th>Date Created</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <!-- <th>Phone Number</th> -->
                                            <th>Date Created</th>
                                            <th>Action</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $indexKey => $usr)
                                          <tr>
                                            <td>{{++$indexKey}}</td>
                                            <td>{{$usr->firstname}} {{$usr->lastname}}</</td>
                                            <td>{{$usr->email}}</</td>
                                            <!-- <td>{{$usr->phoneNumber}}</</td> -->
                                            <td>{{$usr->created_at->isoFormat('MMMM Do YYYY')}}</td>
                                            <!-- <td><a href="{{route('profile.edit',$usr->id)}}">View</a><i></i></td> -->
                                            <td><a href="{{route('vendor.show',$usr->id)}}">Show Vendor</a><i class="fab fa-view-f fa-fw"></i></td>
                                            <td><a href="{{route('vendor.items',$usr->id)}}">Show Vendor Items</a><i class="fab fa-view-f fa-fw"></i></td>

                                          </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                            @else
                  <P>NO Vendor</P>
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