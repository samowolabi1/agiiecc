@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="h3 mb-0 text-gray-800">Vendor Item Image Upload   &nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;

            <span>
              <small>
                <a style="text-decoration: none; color: gray;" class="anchor" href="{{ route('vendor.items',$user->id)}}">Vendor Items </a> 
                <!-- <a href="">Vendors  </a>  -->
                <!-- <a href="">Vendors > </a>  -->

            </small>
          </span>

        </p>
        <!-- @if(!empty($company)) -->
        <!-- <a href="#" button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Create New Item </a> -->
        <!-- @endif -->
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
                            <form action="{{ route('admin.upload.images') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
                            @csrf
                            <h4 class="mb-4">Upload Product Images</h4>
                            <div class="mb-3">
                                <label for="images" class="form-label">Select Up to 4 Images</label>
                                <input 
                                    type="file" 
                                    name="images[]" 
                                    id="images" 
                                    class="form-control" 
                                    multiple 
                                    required 
                                    accept="image/*" 
                                    onchange="validateFileLimit(this)"
                                >
                                <small class="form-text text-muted">
                                    You can upload up to 4 images (jpeg, png, jpg, gif). Each file should not exceed 2MB.
                                </small>
                            </div>
                            <div id="file-error" class="text-danger small mt-2 d-none">
                                You can only upload up to 4 images. Please remove excess files.
                            </div>

                            <input type="hidden" name="userId" value="{{$user->id}}"> 
                            <input type="hidden" name="productId" value="{{$productId}}"> 
                             <input type="hidden" name="itemId" value="{{$itemId}}"> 
                            <button type="submit" class="btn btn-primary w-100 mt-3">Upload Images</button>
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