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


        <div style="height: 40px;"></div>

        <div class="row m-3">
            <div class="col-md-12 p-5">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <form action="{{route('create.company')}}" method="post" enctype="multipart/form-data">
                            @csrf

                              <div class="form-row">

                                <div class="form-group col-md-6">
                                  <label class="control-label">Business Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Business Name" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                          <span class="text-danger">{{$errors->first('name')}}</span> 
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                  <label class="control-label">Display Name</label>
                                    <input type="text" name="brand_name" class="form-control" placeholder="Business Display Name" value="{{ old('brand_name') }}" required>
                                    @if ($errors->has('brand_name'))
                                      <span class="text-danger">{{$errors->first('brand_name')}}</span> 
                                    @endif                                        
                                </div>
                              </div>

                           
                            
                             <div class="form-group col-md-12">
                                <label class="control-label">Company Short Description</label>
                                    <textarea name="short_description" class="form-control" placeholder="Short description about your company" maxlength="87" value="" autocomplete required></textarea>
                                    @if ($errors->has('short_description'))
                                      <span class="text-danger">{{$errors->first('short_description')}}</span> 
                                @endif
                                
                            </div>

                             <div class="form-group col-md-12">
                                <label class="control-label">Company Address</label>
                                    <input name="address" class="form-control" placeholder="Company Address" required>
                                    @if ($errors->has('address'))
                                      <span class="text-danger">{{$errors->first('address')}}</span> 
                                @endif
                                
                            </div>

                           

                             <div class="form-group col-md-12">
                                <label class="control-label">Company Website (Optional)</label>
                                    <input type="text" name="website" class="form-control" placeholder="Short description about your product" maxlength="87" required>
                                    @if ($errors->has('website'))
                                      <span class="text-danger">{{$errors->first('website')}}</span> 
                                    @endif
                                
                            </div> 

                             <div class="form-row">

                                <div class="form-group col-md-3">
                                  <label class="control-label">Facebook Link</label>
                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook Link" value="{{ old('facebook') }}" required>
                                    @if ($errors->has('facebook'))
                                          <span class="text-danger">{{$errors->first('facebook')}}</span> 
                                    @endif
                                </div>

                                <div class="form-group col-md-3">
                                  <label class="control-label">Whatsapp Link</label>
                                    <input type="text" name="whatsapp" class="form-control" placeholder="Whatsapp Link" value="{{ old('whatsapp') }}" required>
                                    @if ($errors->has('whatsapp'))
                                      <span class="text-danger">{{$errors->first('whatsapp')}}</span> 
                                    @endif                                        
                                </div>

                                <div class="form-group col-md-3">
                                  <label class="control-label">Twitter(X) Link</label>
                                    <input type="text" name="twitter" class="form-control" placeholder="Twitter Link" value="{{ old('twitter') }}" required>
                                    @if ($errors->has('twitter'))
                                      <span class="text-danger">{{$errors->first('twitter')}}</span> 
                                    @endif                                        
                                </div>

                                  <div class="form-group col-md-3">
                                  <label class="control-label">Instagram Link</label>
                                    <input type="text" name="instagram" class="form-control" placeholder="Instagram Link" value="{{ old('instagram') }}" required>
                                    @if ($errors->has('instagram'))
                                      <span class="text-danger">{{$errors->first('instagram')}}</span> 
                                    @endif                                        
                                </div>
                              </div>                               

                                 <button style="background-color:#8FC74A; margin-left: 15px;" type="submit" class="btn btn-success">Create Company</button>
                    </form>
                </div>

            </div>

            
        </div>

        
    </div>
</section>



@endsection