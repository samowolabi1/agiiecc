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
                   <form action="{{ route('upload.images') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
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
                            <button type="submit" class="btn btn-primary w-100 mt-3">Upload Images</button>
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

<script>
    function validateFileLimit(input) {
        const maxFiles = 4;
        const errorElement = document.getElementById('file-error');
        
        if (input.files.length > maxFiles) {
            errorElement.classList.remove('d-none');
            input.value = ''; // Reset the input if the limit is exceeded
        } else {
            errorElement.classList.add('d-none');
        }
    }
</script>
