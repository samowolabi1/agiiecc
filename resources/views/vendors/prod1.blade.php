@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="h3 mb-0 text-gray-800">Vendor Product   &nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;

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

                        <div class="col-md-12">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> Company Details :- {{$user->firstname}}  {{$user->lastname}} - {{$user->email}}</h6>
                                </div>
                                <div class="card-body">
                                     @empty($company)
                                        <div class="col-md-12">
                                            <form action="{{route('admin.create.product')}}" method="post" enctype="multipart/form-data">
                                     @csrf
                          

                                <div class="form-group col-md-12">
                                    <label class="control-label">Product Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="A descriptive Name" value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                          <span class="text-danger">{{$errors->first('name')}}</span> 
                                        @endif 
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Product Short Description</label>
                                        <input type="text" name="short_description" class="form-control" placeholder="Short Description" value="{{ old('short_description') }}" required>
                                        @if ($errors->has('short_description'))
                                          <span class="text-danger">{{$errors->first('short_description')}}</span> 
                                        @endif 
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Product Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Long  Description" value="{{ old('description') }}" required>
                                        @if ($errors->has('description'))
                                          <span class="text-danger">{{$errors->first('description')}}</span> 
                                        @endif 
                                    </div>

                                </div>                                                           

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Product Category</label>
                                        <select class="form-control" name="type_id" required>
                                            <option selected>Pick a product category</option>
                                        @foreach($type as $ty)
                                            <option value="{{$ty->id}}">{{$ty->name}}</option>
                                        @endforeach
                                        </select>
                                          @if ($errors->has('ty_id'))
                                            <span class="text-danger">Category is required</span> 
                                          @endif 
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Product Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="24000" value="{{ old('price') }}" required>
                                        @if ($errors->has('price'))
                                          <span class="text-danger">{{$errors->first('price')}}</span> 
                                        @endif
                                    </div>

                                </div> 

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Product Color</label><br>
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                            @foreach($color as $cl)
                                          <input value="{{$cl->id}}" type="checkbox" name="color_id[]" class="btn-check" id="cl{{$cl->id}}" autocomplete="off" >
                                          <label class="btn btn-outline-primary" for="cl{{$cl->id}}">{{$cl->name}}</label>
                                          &nbsp;&nbsp; <br>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Product Size</label><br>
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                            @foreach($size as $sz)
                                          <input value="{{$sz->id}}" type="checkbox" name="size_id[]" class="btn-check" id="{{$sz->id}}" autocomplete="off">
                                          <label class="btn btn-outline-primary" for="{{$sz->id}}">{{$sz->name}}</label>
                                          &nbsp;&nbsp;
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>  <br>       
                                <input type="hidden" name="userId" value="{{$user->id}}">                                              

                                 <button type="submit" class="btn btn-primary">NEXT</button>
                             
                              </form>
                                        </div>
                                     @endempty
                                   
                                </div>
                            </div>

                           
                        </div>

                        <!-- Donut Chart -->
  <!--           <div class="col-md-4">
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
            </div> -->
    </div>



   
    

</div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->
@endsection