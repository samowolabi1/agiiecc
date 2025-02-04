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
                            <h2 class="media-heading">Welcome {{ Auth::user()->firstname }} </h2>
                            <p>Created - 2 Years Ago || Last Login - 2 Days ago </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

<div style="height: 40px;"></div>

         <div class="row m-3">
                    <div class="col-md-2">

                                <!-- Widget Category -->
            <div class="widget widget-category">
                <h4 class="widget-title"></h4>
                <ul class="widget-category-list">
                    <li><a href="#!">My Messages</a>
                    </li>
                    <li><a href="#!">Feedback</a>
                    </li>
                    <li><a href="#!">Support</a>
                    </li>
                    <li><a href="#!">FAQ</a>
                    </li>
                </ul>
            </div> <!-- End category  -->             

              
                
            </div>

            <div class="col-md-8">
                
                      <div class="total-order">
                    


                          <div style="height: 500px;" class="row bg-white">
                                <div >
                                  <div class="started">
                                    <h4 class="text-primary">Simple Steps To Take &nbsp; <i class="fa fa-pencil"></i></h4>
                                    <ol>
                                      <li>&nbsp; 1. Check your mailbox for our welcome mail</li><br>
                                      <li>&nbsp; 2. Get your shop details ready! Such as Name, Description and Slogan</li><br>
                                      <li>&nbsp; 3. Click the "blue button" above to create your shop</li><br>
                                      <li class="text-danger">&nbsp; 
                                    </ol>
                                    
                                       @if(empty(auth()->user()->company->id))
                              <a href="{{route('profile.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-bank text-white-50"></i> Create a profile to start selling</a>
                              @endif
                                  </div>
                                </div>
                             
                                
                              </div>

                    </div>
            </div>
            
        </div>
    </div>
</section>



@endsection