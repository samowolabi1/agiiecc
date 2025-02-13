@extends('layouts.master')

@section('content')
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="m-3 row">
                <div class="col-md-12">
                    @include('partials.userdshheader')


                    <div class="dashboard-wrapper user-dashboard">
                        <div class="media">

                            <div class="media-body">
                                <h2 class="media-heading">My Adverts </h2>
                                <!-- <p>Created - 2 Years Ago || Last Login - 2 Days ago </p> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div style="height: 40px;"></div>

            <div class="m-3 row">
                <div class="col-md-2">
                    <!-- Widget Category -->
                    @include('adverts.sidebar.sidebar')
                </div>

                <div class="col-md-10">
                    <h3><b> {{ session('category_name') }} Advert</b></h3>
                    <br>
                    <div class="card-body">

                        <div class="col-md-12">
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
                               <div class="text-center card-header">
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




            </div>


    </section>
    <!-- JavaScript to Toggle Forms -->

@endsection
