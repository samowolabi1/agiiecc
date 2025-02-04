@extends('layouts.admin')

@section('content')

        
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee Information</h1>
       
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModalCenter"> Create New Product</a> -->
       
    </div>

     <div class="row">

                        <div class="col-md-8">

                            <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> {{$user->firstname}}  {{$user->lastname}}</h6>
                                </div>
                                <div class="card-body">
                                    

                                      @if(!empty($user))
                                        
                                            
                                           <div class="col-md-12">

                                            <table style="border:0px;" class="table table-hover">
                                              
                                                <tr>                          
                                                  <td style="border:0px;"><strong>First Name: </strong></td>
                                                  <td style="border:0px;">{{$user->firstname ?? ''}}</td>
                                                </tr>
                                                <tr>                          
                                                  <td style="border:0px;"><strong>Last Name: </strong></td>
                                                  <td style="border:0px;">{{$user->lastname ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                  <td style="border:0px;"><strong>Email: </strong></td>
                                                  <td style="border:0px;">{{$user->email ?? ''}}</td>
                                                </tr>
                                                <tr>
                                                  <td style="border:0px;"><strong>Gender: </strong></td>
                                                  <td style="border:0px;">{{$user->sex ?? ''}}</td>
                                                </tr>
                                                

                                                <tr>
                                                  <td style="border:0px;"><strong>Date Created </strong></td>
                                                  <td style="border:0px;">{{$user->created_at->isoFormat('MMMM Do YYYY')}}</td>
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