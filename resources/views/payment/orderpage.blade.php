@extends('layouts.admin')

@section('content')

        <script src="https://js.paystack.co/v2/inline.js"></script>
        <script type="text/javascript">
          const popup = new PaystackPop()
popup.resumeTransaction(access_code)
        </script>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Advert Payment Information</h1>
        <!-- @if(!empty($company)) -->
        <a href="#" button type="button" class="btn btn-primary"> Go Back </a>
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
             <form action="{{route('admin.order.advert')}}" method="post" enctype="multipart/form-data">
                                     @csrf
              
                <div class="form-group col-md-12">
                    <label class="control-label">Product Category</label>
                      <select class="form-control" name="advertfee_id" required>
                          <option selected>Pick a new Subscription</option>
                      @foreach($advertfee as $advfee)
                          <option value="{{$advfee->id}}">{{$advfee->name}} - {{$advfee->tenor}} - Cost: &#x20a6;{{number_format($advfee->cost)}}</option>
                      @endforeach
                      </select>
                        @if ($errors->has('advfee_id'))
                          <span class="text-danger">Category is required</span> 
                        @endif 
                  </div>

                   <input type="hidden" name="advertId" value="{{$adverts->id}}">                                              
                   <button type="submit" class="btn btn-primary">Submit</button>
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
                                            <h6 class="m-0 font-weight-bold text-primary">PAYMENT INFORMATION</h6>
                                        </div>


                                        <table style="border:0px;" class="table table-hover">
                                              
                                            <tr>                          
                                              <td style="border:0px;"><strong>Title: </strong></td>
                                              <td style="border:0px;">{{$adverts->advertfee->name ?? ''}}</td>

                                              <td style="border:0px;"><strong>Tenor: </strong></td>
                                              <td style="border:0px;">{{$adverts->advertfee->tenor ?? ''}}</td>
                                            </tr>

                                             <tr>
                                              <td style="border:0px;"><strong>Months: </strong></td>
                                              <td style="border:0px;">{{$adverts->advertfee->months ?? ''}}</td>

                                              <td style="border:0px;"><strong>Days: </strong></td>
                                              <td style="border:0px;">{{$adverts->advertfee->days ?? ''}}</td>
                                              
                                            </tr>

                                            <tr>
                                              <td style="border:0px;"><strong>Cost: </strong></td>
                                              <td style="border:0px;">&#x20a6;{{number_format($adverts->advertfee->cost ?? '')}}</td>


                                              <td style="border:0px;"><strong>Tax: </strong></td>
                                              <td style="border:0px;">{{$adverts->advertfee->tax ?? ''}}%</td>
                                            </tr>

                                            <tr>
                                              <td style="border:0px;"><strong>Charges: </strong></td>
                                              <td style="border:0px;">{{$adverts->advertfee->charges ?? ''}}</td>

                                              <td style="border:0px;"><strong>Expires In: </strong></td>
                                              <td style="border:0px;">{{\Carbon\Carbon::now()->addMonths($adverts->advertfee->months)}}

                                              </td>

                                                
                                            </tr>

                                            </tr>

                                             <tr>
                                              <td class="text-danger" style="border:0px;"><strong>TOTAL AMOUNT: </strong></td>
                                              <td class="text-danger" style="border:0px;"><strong>
                                                &#x20a6;{{number_format($advCost)}}

                                              </strong></td>

                                                
                                            </tr>
                                        </table>

                                      <form method="POST" action="{{ route('payment') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                        <div class="row" style="margin-bottom:40px;">
                                            <div class="col-md-12">
                                                
                                              <input type="hidden" name="email" value="{{$adverts->user->email}}"> 
                                                <input type="hidden" name="orderID" value="{{$orderId}}">
                                                <input type="hidden" name="amount" value="{{$advCost * 100}}"> 
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="currency" value="NGN">
                                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > 
                                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 

                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                                                <input type="hidden" name="advert_id" value="{{$adverts->id}}">
                                                <input type="hidden" name="advertfee_id" value="{{$adverts->advertfee->id}}">
                                                <input type="hidden" name="product_id" value="{{$adverts->product->id}}">
                                                <input type="hidden" name="user_id" value="{{$adverts->user->id}}">

                                                <p>
                                                    <button class="btn btn-success btn-block" type="submit" value="Pay Now!">
                                                         PAY  &#x20a6;{{number_format($advCost)}} NOW!
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                              
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> Vendor Details :- {{$adverts->user->firstname}}  {{$adverts->user->lastname}} - Email: {{$adverts->user->email}}</h6>
                                </div>
                                <div class="card-body">
                                    
                                      @if(!empty($adverts))
                                        
                                            
                                           <div class="col-md-12">

                                            <table style="border:0px;" class="table table-hover">
                                              
                                                <tr>                          
                                                  <td style="border:0px;"><strong>Company Name: </strong></td>
                                                  <td style="border:0px;">{{$adverts->company->name ?? ''}}</td>

                                                  <td style="border:0px;"><strong>Category: </strong></td>
                                                  <td style="border:0px;">{{$adverts->category->name ?? ''}}</td>
                                                </tr>


                                                 <tr>
                                                  <td style="border:0px;"><strong>Product Name: </strong></td>
                                                  <td style="border:0px;">{{$adverts->product->name ?? ''}}</td>


                                                  <td style="border:0px;"><strong>Approval: </strong></td>
                                                  <td style="border:0px;">{{$adverts->approved ?? ''}}</td>
                                                </tr>

                                                 <tr>
                                                  <td style="border:0px;"><strong>Payment: </strong></td>
                                                  <td style="border:0px;">{{$adverts->paid ?? ''}}</td>

                                                   <td style="border:0px;"><strong>Comment</strong></td>
                                                  <td style="border:0px;">{{$adverts->comment}}</td>  
                                                </tr>

                                                <tr>
                                                  <td style="border:0px;"><strong>Status: </strong></td>
                                                  <td style="border:0px;">{{$adverts->status ?? ''}}</td>

                                                   <td style="border:0px;"><strong>Advert Level</strong></td>
                                                  <td style="border:0px;">{{$adverts->level}}</td>  
                                                </tr>

                                                <tr>
                                                   <td style="border:0px;"><strong>Date Created</strong></td>
                                                  <td style="border:0px;">{{$adverts->created_at->isoFormat('MMMM Do YYYY')}}</td>  
                                                </tr>
                                            </table>                               

                                
                                        </div>
                                        @endif
                                   
                                </div>
                            </div>

                           
                        </div>

                        <!-- Donut Chart -->
            <div class="col-md-4">
                    <!-- <div class="card">
                      <div class="card-header text-center">
                        Information Center
                      </div>
                          <div class="p-3">
                        
                                  <div>
                                      <div class="card-body">

                                          <div class="row">
                                            <br>
                                            <div class="col-md-6">
                                            <a href="{{route('admin.approve.advert',$adverts->id)}}" class="btn btn-info">Change Approval</a>
                                            
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{route('admin.status.advert',$adverts->id)}}" class="btn btn-info">Change Status</a>
                                            
                                        </div>
                                            
                                        </div>

                                        <br>
                                        <hr>
                                        <h6 class="card-title text-primary"><strong>Last Advert Payment Cost: </strong></h6>
                                        <hr>

                                        <br>

                                        <h6 class="card-title text-primary"><strong>Next Advert Cost: </strong></h6>
                                       
                                        <hr>
                                        <br>

                                        <a href="#" class="btn btn-primary"> Make Payment</a>
                                        
                                         

                                      </div>
                    
                                    </div> 
                            
                          </div>
                    </div> -->
            </div>
    </div>



   
    

</div>
                <!-- /.container-fluid -->

            <!-- End of Main Content -->
@endsection