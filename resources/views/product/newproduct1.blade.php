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
                            <h2 class="media-heading">New Advert </h2>
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
                    <form action="{{route('create.product')}}" method="post" enctype="multipart/form-data">
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
                                          <input value="{{$cl->id}}" type="checkbox" name="color_id[]" class="btn-check" id="cl{{$cl->id}}" autocomplete="off">
                                          <label class="btn btn-outline-primary" for="cl{{$cl->id}}">{{$cl->name}}</label>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                      <label class="control-label">Product Size</label><br>
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                            @foreach($size as $sz)
                                          <input value="{{$sz->id}}" type="checkbox" name="size_id[]" class="btn-check" id="{{$sz->id}}" autocomplete="off">
                                          <label class="btn btn-outline-primary" for="{{$sz->id}}">{{$sz->name}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                </div>  <br>                                                     

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