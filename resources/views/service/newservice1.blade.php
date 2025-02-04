@extends('layouts.master')

@section('content')


<section class="user-dashboard page-wrapper">
    <div class="container">

        <div class="row m-3">
            <div class="col-md-12">
               @include('partials.userdshheader')
                

                <div class="dashboard-wrapper user-dashboard">
                    <div class="media">
                        
                        <div class="media-body">
                            <h2 class="media-heading">New Service Advert </h2>
                            <!-- <p>Created - 2 Years Ago || Last Login - 2 Days ago </p> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div style="height: 10px;"></div>

        <div class="row m-3">
            <div class="col-md-8">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <form action="{{route('create.service')}}" method="post" enctype="multipart/form-data">
                            @csrf
                          

                                <div class="form-group col-md-12">
                                    <label class="control-label">Service Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="A descriptive Name" value="{{ old('name') }}" required>
                                        @if ($errors->has('name'))
                                          <span class="text-danger">{{$errors->first('name')}}</span> 
                                        @endif 
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Short Short Description</label>
                                        <input type="text" name="short_description" class="form-control" placeholder="Short Description" value="{{ old('short_description') }}" required>
                                        @if ($errors->has('short_description'))
                                          <span class="text-danger">{{$errors->first('short_description')}}</span> 
                                        @endif 
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Service Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Long  Description" value="{{ old('description') }}" required>
                                        @if ($errors->has('description'))
                                          <span class="text-danger">{{$errors->first('description')}}</span> 
                                        @endif 
                                    </div>

                                </div>                                                           

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Service Category</label>
                                        <select class="form-control" name="servicetype_id" required>
                                            <option selected>Pick a service category</option>
                                        @foreach($servicetypes as $ty)
                                            <option value="{{$ty->id}}">{{$ty->name}}</option>
                                        @endforeach
                                        </select>
                                          @if ($errors->has('ty_id'))
                                            <span class="text-danger">Category is required</span> 
                                          @endif 
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Service Cost</label>
                                        <input type="number" name="price" class="form-control" placeholder="24000" value="{{ old('price') }}" required>
                                        @if ($errors->has('price'))
                                          <span class="text-danger">{{$errors->first('price')}}</span> 
                                        @endif
                                    </div>

                                </div> 

                                                                                 

                                 <button style="background-color:#8FC74A; margin-left: 15px;" type="submit" class="btn btn-success btn-lg">NEXT</button>
                             
                    </form>
                </div>
                    <br><br>
            </div> 

            <div class="col-md-4">
                    <div class="card">
                      <div class="card-header text-center">
                        Information Center
                      </div>
                      <div class="p-3">
                    
                              <div>
                                  <div class="card-body">
                                    <h5 class="card-title text-primary"><strong>Product</strong></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                    <br>

                                    <h5 class="card-title text-primary"><strong>Services</strong></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                    <br>

                                    <h5 class="card-title text-primary"><strong>Ride</strong></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                  </div>
                
                                </div> 
                        
                      </div>
                    </div>

                                         
        </div>

        
    </div>
</section>



@endsection