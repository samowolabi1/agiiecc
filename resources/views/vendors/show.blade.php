@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Vendor Information</h1>
        <!-- @if(!empty($company)) -->
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter"> Create New Item </a>
        <!-- @endif -->
    </div>

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
                                        <form action="{{route('create.company.admin')}}" method="post" enctype="multipart/form-data">
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

                                          <input type="hidden" name="userId" value="{{$id}}">
                                        
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

                                      

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">State</label>
                                                <select class="form-control" name="state_id" required>
                                                        <option selected>Choose...</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                                  @if ($errors->has('state_id'))
                                                    <span class="text-danger">State is required</span> 
                                                  @endif    
                                            
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Phone Number</label>
                                                <input name="phone_number" class="form-control" placeholder="Mobile Phone Number" required>
                                                @if ($errors->has('phone_number'))
                                                  <span class="text-danger">{{$errors->first('phone_number')}}</span> 
                                            @endif
                                            
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="control-label">Marketer Name</label>
                                                <select class="form-control" name="maketer_id" required>
                                                        <option selected>Choose a Marketer</option>
                                                    @foreach($employees as $emp)
                                                        <option value="{{$emp->id}}">{{$emp->firstname}} {{$emp->lastname}}</option>
                                                    @endforeach
                                                </select>
                                                  @if ($errors->has('maketer_id_id'))
                                                    <span class="text-danger">Name is required</span> 
                                                  @endif    
                                            
                                        </div>
                                    
                                             

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
                                     @endempty

                                      @if(!empty($company))
                                        
                                            
                                           <div class="col-md-12">

                                            <table style="border:0px;" class="table table-hover">
                                              
                                                <tr>                          
                                                  <td style="border:0px;"><strong>Company Name: </strong></td>
                                                  <td style="border:0px;">{{$company->name ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                  <td style="border:0px;"><strong>Description: </strong></td>
                                                  <td style="border:0px;">{{$company->description ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                  <td style="border:0px;"><strong>Address: </strong></td>
                                                  <td style="border:0px;">{{$company->description ?? ''}}</td>
                                                </tr>

                                                 <tr>
                                                  <td style="border:0px;"><strong>Phone Number: </strong></td>
                                                  <td style="border:0px;">{{$company->phone_number ?? ''}}</td>
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;" class="text-primary"><strong>Marketer Name</strong></td>
                                                  <td style="border:0px;" class="text-primary">{{$company->created_by ?? ''}}</td>
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;"><strong>Website: </strong></td>
                                                  <td style="border:0px;">{{$company->website ?? ''}}</td>
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;"><strong>Social Media: </strong></td>
                                                  <td style="border:0px;">
                                                    <a href="{{$company->facebook ?? ''}}" target="_blank">
                                                        Facebook<i class="fas fa-fw fa-facebook"></i>
                                                        </a>  <a href="{{$company->facebook ?? ''}}" target="_blank">
                                                        <i class="fas fa-fw fa-instagram"></i>
                                                        Twitter</a>  <a href="{{$company->facebook ?? ''}}" target="_blank">
                                                        <i class="fas fa-fw fa-whatsapp"></i>
                                                        Whatsapp</a>
                                                    

                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td style="border:0px;"><strong>Images </strong></td>
                                                  <td style="border:0px;"> </td>
                                                </tr>
                                            </table>
                                               
                                           

                                          

                                
                                        </div>
                                        @endif
                                   
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