
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
                            <h2 class="media-heading">My Profile </h2>
                            <!-- <p>Created - 2 Years Ago || Last Login - 2 Days ago </p> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>


<div style="height: 40px;"></div>

         <div class="row m-3">
                    <div class="col-md-4">

                                <!-- Widget Category -->
            <div class="widget widget-category">
                <h4 class="widget-title"></h4>
                <ul class="widget-category-list">
                    <li><a href="#!">View Profile</a>
                    </li>
                    <li><a href="#!">Change Information</a>
                    </li>
                </ul>
            </div> <!-- End category  -->             

              
                
            </div>

            <div class="col-md-8">
                
                      <div class="total-order">
                        <h4>You have no running adverts</h4>
                        <div class="table-responsive">
                        
          <form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="control-label">Company/Business Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Product name should be descriptive" value="{{ old('name') }}" maxlength="25" autocomplete required>
                    @if ($errors->has('name'))
                          <span class="text-danger">{{$errors->first('name')}}</span> 
                    @endif
                </div>
                  <label class="control-label">Category</label>
                <div style="width: 100%;" class="form-group clearfix">
                   <select style="width:200px; border: 2px;" class="selectpicker form-control" name="productcat_id" required>
                    <option value=""> Select Product Category </option>
                        @foreach($productcats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">Brand Name</label>
                    <input type="text" name="brand" class="form-control" placeholder="Product Brand Name " value="{{ old('brand') }}" maxlength="18" autocomplete required>
                    @if ($errors->has('brand'))
                          <span class="text-danger">{{$errors->first('brand')}}</span> 
                    @endif
                </div>
                
                 <div class="form-group">
                    <label class="control-label">Short Description</label>
                        <textarea name="short_description" class="form-control" placeholder="Short description about your product" maxlength="87" value="{{ old('short_description') }}" autocomplete required></textarea>
                        @if ($errors->has('short_description'))
                          <span class="text-danger">{{$errors->first('short_description')}}</span> 
                    @endif
                    
                </div>

              

                <div class="form-group">
                    <label class="control-label">Full Description</label>
                        <textarea name="description" class="ckeditor" placeholder="Full information about your product" value="{{ old('description') }}" autocomplete required></textarea>
                        @if ($errors->has('description'))
                          <span class="text-danger">{{$errors->first('description')}}</span> 
                    @endif
                    
                </div>

                <div class="form-group">
                    <label class="control-label">Price</label>
                    <input type="text" pattern="[0-9]{1,}" name="price" class="form-control" value="{{ old('price') }}" autocomplete>
                    @if ($errors->has('price'))
                          <span class="text-danger">{{$errors->first('price')}}</span> 
                    @endif
                </div>

                <div class="form-group">
                 <label class="control-label">Product Delivery States</label>
                <select style="width:200px; border: 3px;" name="delivery_coverage[]" class="selectpicker form-control" multiple required>
                                            <option value="Abia">Abia</option>
                                            <option value="Adamawa">Adamawa</option>
                                            <option value="Akwa Ibom">Akwa Ibom</option>
                                            <option value="Anambra">Anambra</option>
                                            <option value="Bauchi">Bauchi</option>
                                          
                        
                    </select>
                    @if ($errors->has('delivery_coverage'))
                          <span class="text-danger">{{$errors->first('delivery_coverage')}}</span> 
                    @endif
                </div>
<br>
                <div class="form-group">
                    <label class="control-label">Tags</label>
                    <input type="text" name="tags" class="form-control" placeholder="shoes,bags,wears,red,quality" value="{{ old('tags') }}" autocomplete required>
                    @if ($errors->has('tags'))
                          <span class="text-danger">{{$errors->first('tags')}}</span> 
                    @endif
                </div>

                 <div class="form-group">
                  <label for="file">Image 1</label>
                  <input type="file" name="image1" class="form-control">
                   @if ($errors->has('image1'))
                         <span class="text-danger">File size must be below 4 megabyte or wrong file type is selected</span>
                  @endif
              </div>

              <div class="form-group">
                  <label for="file">Image 2</label>
                  <input type="file" name="image2" class="form-control">
                   @if ($errors->has('image2'))
                         <span class="text-danger">File size must be below 4 megabyte or wrong file type is selected</span>
                  @endif
              </div>

              <div class="form-group">
                  <label for="file">Image 3</label>
                  <input type="file" name="image3" class="form-control">
                   @if ($errors->has('image3'))
                         <span class="text-danger">File size must be below 4 megabyte or wrong file type is selected</span>
                  @endif
              </div>

              

                     <button style="background-color:#FF7648;" type="submit" class="btn btn-success">Create Product</button>
            </form>
                        </div>
                    </div>
            </div>
            
        </div>

        
    </div>
</section>



@endsection