@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                  <div class="container-fluid">

                      <!-- Page Heading -->
                      <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <p class="h3 mb-0 text-gray-800">Vendor Ride   &nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;

                            <span>
                              <small>
                                <a style="text-decoration: none; color: gray;" class="anchor" href="{{ route('vendor.show',$user->id)}}">Go Back  </a> 
                                <!-- <a href="">Vendors  </a>  -->
                                <!-- <a href="">Vendors > </a>  -->

                            </small>
                          </span>

                        </p>
                          <!-- @if(!empty($company)) -->
                          <!-- <a href="#" button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Create New Item </a> -->
                          <!-- @endif -->
                          <!-- breadcrumbs -->


                          <!-- breadcrumbs end -->
                      </div>
                  <!-- modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              
                                  ......

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>

                  <!-- ends modal -->

     <div class="row">

                        <div class="col-md-8">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> Company Details :- {{$user->firstname}}  {{$user->lastname}} - {{$user->email}}</h6>
                                </div>
                                <div class="card-body">
                                     @empty($company)
                              <div class="col-md-12">
                    <form action="{{route('admin.create.ride')}}" method="post" enctype="multipart/form-data">
                            @csrf
                          

                                <div class="form-group col-md-12">
                                    <label class="control-label">Ride Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="A descriptive Name" value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                          <span class="text-danger">{{$errors->first('name')}}</span> 
                                        @endif 
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">Full Address</label>
                                    <input type="text" name="full_address" class="form-control" placeholder="Your full home address" value="{{ old('full_address') }}" required>
                                        @if ($errors->has('full_address'))
                                          <span class="text-danger">{{$errors->first('full_address')}}</span> 
                                        @endif 
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                      <label class="control-label">License Number</label>
                                        <input type="text" name="license_number" class="form-control" placeholder="License Number" value="{{ old('license_number') }}" required>
                                        @if ($errors->has('license_number'))
                                          <span class="text-danger">{{$errors->first('license_number')}}</span> 
                                        @endif 
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Car Plate Number</label>
                                        <input type="text" name="car_plate_number" class="form-control" placeholder="Plate Number" value="{{ old('car_plate_number') }}" required>
                                        @if ($errors->has('car_plate_number'))
                                          <span class="text-danger">{{$errors->first('car_plate_number')}}</span> 
                                        @endif 
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Car Engine Number</label>
                                        <input type="text" name="car_engine_number" class="form-control" placeholder="Engine Number" value="{{ old('car_engine_number') }}" required>
                                        @if ($errors->has('car_engine_number'))
                                          <span class="text-danger">{{$errors->first('car_engine_number')}}</span> 
                                        @endif 
                                    </div>

                                </div>                                                           

                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                      <label class="control-label">State of Origin</label>
                                        <select class="form-control" name="state_id" required>
                                            <option selected>Pick a state of origin</option>
                                        @foreach($states as $st)
                                            <option value="{{$st->id}}">{{$st->name}}</option>
                                        @endforeach
                                        </select>
                                          @if ($errors->has('st_id'))
                                            <span class="text-danger">State of origin required</span> 
                                          @endif 
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Ride Cost Starts From</label>
                                        <input type="number" name="price" class="form-control" placeholder="24000" value="{{ old('price') }}" required>
                                        @if ($errors->has('price'))
                                          <span class="text-danger">{{$errors->first('price')}}</span> 
                                        @endif
                                    </div>


                                    <div class="form-group col-md-4">
                                      <label class="control-label">Class of Ride</label>
                                        <select class="form-control" name="ridetype_id" required>
                                            <option selected>Pick your class of ride</option>
                                        @foreach($ridetypes as $rdt)
                                            <option value="{{$rdt->id}}">{{$rdt->name}}</option>
                                        @endforeach
                                        </select>
                                          @if ($errors->has('ridetype_id'))
                                            <span class="text-danger">Class of ride required</span> 
                                          @endif 
                                    </div>

                                </div> 

                                <div class="form-row">
                                    
                                    <div class="col-md-12"><br>
                                        <span class="text-primary"> SPOUSE INFORMATION</span><br><br>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label class="control-label">Spouse Name</label>
                                        <input type="text" name="spouse_name" class="form-control" placeholder="Spouse Name" value="{{ old('spouse_name') }}" required>
                                        @if ($errors->has('spouse_name'))
                                          <span class="text-danger">{{$errors->first('spouse_name')}}</span> 
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Spouse Phone Number</label>
                                        <input type="text" name="spouse_phone_number" class="form-control" placeholder="Spouse Phone Number" value="{{ old('spouse_phone_number') }}" required>
                                        @if ($errors->has('spouse_phone_number'))
                                          <span class="text-danger">{{$errors->first('spouse_phone_number')}}</span> 
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Spouse Address</label>
                                        <input type="text" name="spouse_address" class="form-control" placeholder="Spouse Address" value="{{ old('price') }}" required>
                                        @if ($errors->has('spouse_address'))
                                          <span class="text-danger">{{$errors->first('spouse_address')}}</span> 
                                        @endif
                                    </div>

                                </div> 

                                <div class="form-row">
                                    
                                    <div class="col-md-12"><br>
                                        <span class="text-primary"> NEXT OF KIN INFORMATION</span><br><br>
                                    </div>
                                    <div class="form-group col-md-4">
                                      <label class="control-label">Next of Name</label>
                                        <input type="text" name="next_of_kin_name" class="form-control" placeholder="Full Name" value="{{ old('next_of_kin_name') }}" required>
                                        @if ($errors->has('next_of_kin_name'))
                                          <span class="text-danger">{{$errors->first('next_of_kin_name')}}</span> 
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Phone Number</label>
                                        <input type="text" name="next_of_kin_phone_number" class="form-control" placeholder="Phone Number" value="{{ old('next_of_kin_phone_number') }}" required>
                                        @if ($errors->has('next_of_kin_phone_number'))
                                          <span class="text-danger">{{$errors->first('next_of_kin_phone_number')}}</span> 
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Address</label>
                                        <input type="text" name="next_of_kin_address" class="form-control" placeholder="Address" value="{{ old('next_of_kin_address') }}" required>
                                        @if ($errors->has('next_of_kin_address'))
                                          <span class="text-danger">{{$errors->first('next_of_kin_address')}}</span> 
                                        @endif
                                    </div>
                                        <br>
                                </div> 


                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Car Type</label>
                                        <select class="form-control" name="cartype_id" required>
                                            <option selected>Pick a car type</option>
                                        @foreach($cartypes as $ty)
                                            <option value="{{$ty->id}}">{{$ty->name}}</option>
                                        @endforeach
                                        </select>
                                          @if ($errors->has('cartype_id'))
                                            <span class="text-danger">Car type is required</span> 
                                          @endif 
                                    </div>

                                    <div class="form-group col-md-4">
                                      <label class="control-label">Car Brand</label>
                                        <select class="form-control" name="carbrand_id" required>
                                            <option selected>Pick a car brand</option>
                                        @foreach($carbrands as $bd)
                                            <option value="{{$bd->id}}">{{$bd->name}}</option>
                                        @endforeach
                                        </select>
                                          @if ($errors->has('bd_id'))
                                            <span class="text-danger">Car brand is required</span> 
                                          @endif 
                                    </div>

                                     <div class="form-group col-md-4">
                                      <label class="control-label">Car Color</label>
                                        <select class="form-control" name="color_id" required>
                                            <option selected>Pick a car color</option>
                                        @foreach($colors as $cl)
                                            <option value="{{$cl->id}}">{{$cl->name}}</option>
                                        @endforeach
                                        </select>
                                          @if ($errors->has('cl_id'))
                                            <span class="text-danger">Car color is required</span> 
                                          @endif 
                                    </div>
                                    <br>
                                    <input type="hidden" name="userId" value="{{$user->id}}"> 
                                </div>  <br>                                                     

                                 <button type="submit" class="btn btn-primary">NEXT</button>
                             
                    </form>
                                        </div>
                                     @endempty
                                   
                                </div>
                            </div>

                           
                        </div>

                        <!-- Donut Chart -->
            <div class="col-md-4">
                    <div class="card">
                      <div class="card-header text-center">
                        Information Center
                      </div>
                          <div class="p-3">
                        
                                  <div>
                                      <div class="card-body">
                                        <h6 class="card-title text-primary"><strong>Total Active Ads: </strong></h6>
                                        <hr>

                                        <br>

                                        <h6 class="card-title text-primary"><strong>Total Inactive Ads: </strong></h6>
                                       
                                        <hr>
                                        <br>

                                        <h6 class="card-title text-primary"><strong>Current Ads Expiry Date: </strong></h6>
                                        
                                        <hr>
                                        <br>

                                        <h6 class="card-title text-primary"><strong> Others: </strong></h6>
                                        
                                         <hr>
                                        <br>

                                        <a href="#" class="btn btn-primary"> Send Message to Vendor</a>
                                        
                                         

                                      </div>
                    
                                    </div> 
                            
                          </div>
                    </div>
            </div>
    </div>



   
    

</div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->
@endsection