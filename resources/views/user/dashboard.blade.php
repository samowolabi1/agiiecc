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
                    <div class="col-md-4">

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
                        <h4>Saved Items</h4>
                        <div class="table-responsive">
                         <!--    <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#!">#252125</a></td>
                                        <td>Mar 25, 2016</td>
                                        <td>2</td>
                                        <td>$ 99.00</td>
                                    </tr>
                                
                                </tbody>
                            </table> -->
                        </div>
                    </div>
            </div>
            
        </div>
    </div>
</section>



@endsection