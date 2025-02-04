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
            <div style="height:60px;" class="col-md-8">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <form action="{{route('create.addcat')}}" method="post" enctype="multipart/form-data">
                            @csrf

                              <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label class="control-label">Pick an Advert Category</label>
                                    <select class="form-control" name="category_id" required>
                                            <option selected>Pick a product, service or ride</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                      @if ($errors->has('cat_id'))
                                        <span class="text-danger">Category is required</span> 
                                      @endif 
                                </div>                                                         

                                 <button style="background-color:#8FC74A; margin-left: 15px;" type="submit" class="btn btn-success btn-lg">NEXT</button>
                             </div>
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