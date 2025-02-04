@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Vendor Service Information</h1>
        <!-- @if(!empty($company)) -->
        <a href="#" button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> Create New Item </a>
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
            
                    <form action="{{route('admin.store.advert')}}" method="post" enctype="multipart/form-data">
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

                                    <input type="hidden" name="userId" value="{{$vendor->id}}">
                                 <button type="submit" class="btn btn-primary btn-sm">NEXT</button>
                             </div>
                    </form>

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
                                    <h6 class="m-0 font-weight-bold text-primary"> Vendor: {{$vendor->firstname}}  {{$vendor->lastname}} - Company:  {{$company->name}} </h6>
                                </div>
                                <div class="card-body">

                                      @if(!empty($service))
                                        
                                            
                                           <div class="col-md-12">

                                            <table style="border:0px;" class="table table-hover">
                                              
                                                <tr>                          
                                                  <td style="border:0px;"><strong>Service Name: </strong></td>
                                                  <td style="border:0px;">{{$service->name ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                  <td style="border:0px;"><strong>Description: </strong></td>
                                                  <td style="border:0px;">{{$service->short_description ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                  <td style="border:0px;"><strong>Full Description: </strong></td>
                                                  <td style="border:0px;">{{$service->description ?? ''}}</td>
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;"><strong>Price: </strong></td>
                                                  <td style="border:0px;">&#x20a6;{{number_format($service->price ?? '')}}</td>
                                                </tr>


                                                 <tr>
                                                  <td style="border:0px;"><strong>Service Category: </strong></td>
                                                  <td style="border:0px;">{{$service->sevicetype->name ?? ''}}</td>
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;"><strong>Date Created: </strong></td>
                                                  <td style="border:0px;">{{$service->created_at->isoFormat('MMMM Do YYYY')}}</td>
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;"><strong>Status: </strong></td>
                                                  <td style="border:0px;">{{$service->status ?? ''}}</td>
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;"><strong>Approved: </strong></td>
                                                  <td style="border:0px;">{{$service->approved ?? ''}}</td>
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;" class="text-primary"><strong>Created By</strong></td>
                                                  <td style="border:0px;" class="text-primary">{{$service->created_by ?? ''}}</td>
                                                </tr>

                                            </table>
                                               
                                           

                                          

                                
                                        </div>

                                        <hr>

                                        <div class="card">
                                              <div class="card-header text-center">
                                                Images
                                              </div>
                                                  <div class="p-3">
                                                
                                                          <div>
                                                              <div class="card-body">
                                                                <h6 class="card-title text-primary"><strong></strong></h6>
                                                                <hr>

                                                                <br>
                                                               
                                                                <br>

                                                                <a href="#" class="btn btn-primary"> Edit Images</a>
                                                                
                                                                 

                                                              </div>
                                            
                                                            </div> 
                                                    
                                                  </div>
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

                                        <div class="row">
                                            <br>
                                            <div class="col-md-6">
                                            <a href="{{route('admin.approve.service',$service->id)}}" class="btn btn-info">Change Approved</a>
                                            
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{route('admin.status.service',$service->id)}}" class="btn btn-info">Change Status</a>
                                            
                                        </div>
                                            
                                        </div>

                                        <br>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <br>
                                            <div class="col-md-6">
                                            <a href="#" class="btn btn-info">&nbsp; Edit Item &nbsp;</a>
                                            
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{route('vendor.show',$vendor->id)}}" class="btn btn-info">View Company</a>
                                            
                                        </div>
                                            
                                        </div>

                                        <br>
                                        <hr>
                                        <br>

                                        

                                        <h6 class="card-title text-primary"><strong>
                                            <a href="#" class="a"> Customer Comments </a>
                                        </strong></h6>
                                        <hr>

                                        <br>

                                        <h6 class="card-title text-primary"><strong>
                                            <a href="#" class="a"> Conatct Vendor </a>
                                        </strong></h6>
                                        <hr>

                                        <br>
                                        
                                         

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