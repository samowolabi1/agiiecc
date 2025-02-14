<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Advert;
use App\Models\Advertfee;
use App\Models\User;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use Student;
use Exception;
use Auth;
use DB;


class PaymentController extends Controller
{
    
    public function index(){

        $payments = Payment::all();

       return Response::json([
                'status' => 201,
                'payments' => $payments
            ]);


    }

    public function otherpay(){

        $otherPayments = Product::where('status','Active')->get();

        return Response::json([
            'status' => 201,
            'payments' => $otherPayments
        ]);
    }

    public function order_advert(Request $request){

          //return  $request->all();

                $rules = array(

                'advertfee_id' => 'required',
                'advertId' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
       

            if ($validator->fails()) {

                return response([
                    'error_msg' => $validator->errors()
                ], 400);

        }


        $advert = Advert::find($request->advertId);
        $advert->advertfee_id = $request->advertfee_id;
        $advert->save();

        return redirect()->back()->with('success', 'Advert Subscription added succesfully.');

    }

    public function paying(Request $request){
   
        $rules = array(

            'cost' => 'required',
            'user_id' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required',
    );

    $validator = Validator::make($request->all(), $rules);
   

        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);

        
        }elseif($request->app_id == "" || $request->otherPayId == "" )
        {
            return response([
                'error_msg' => "Payments lacks value"
            ], 400);       

            }else{

                // Set product ID
                if($request->app_id != "" ){
                      
                    $prod_id = $request->app_id;

                    }else{

                        $prod_id = $request->otherPayId;

                    }
            
                    // Get payment details from db
                    $paymentDetails = Product::find($prod_id);

            // Variables
            $ap_amount = $request->cost;
            $ap_title = $paymentDetails->title;
            $userId = $request->user_id;

            $token = $this->createToken($request);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            
            return response([
                'error_msg' => "Payments Failed"
            ], 400);
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            
            return response([
                'error_msg' => "Payments Failed"
            ], 400);
        }

        $charge = $this->createCharge($token['id'], $ap_amount, $ap_title);
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            $request->session()->flash('success', 'Payment completed.');

             $payment = Payment::create([

            'amount' => $ap_amount,
            'description' => $ap_title,
            'purpose' => $paymentDetails->description,
            'user_id' => $userId,
            'product_id' => $prod_id,
            'status' => "Successful",
        ]);

        return Response::json([
            'status' => 201,
            'payments' => $payment
        ]);


        } else {


            return response([
                'error_msg' => "Payments Failed"
            ], 400); 

        }

        return response([
            'error_msg' => "No Charges"
        ], 400); 
        
    
    }

            
    }




   



        public function redirectToGateway(Request $request)
            {
                //return $request->all();

                $rules = [

                        'amount' => 'required',
                        'advert_id' => 'required',
                    ];

                    $validator = Validator::make($request->all(), $rules);

                    if ($validator->fails()) {
                        return response([
                            'error_msg' => $validator->errors(),
                        ], 400);
                    }

                    $advert = Advert::find($request->advert_id);
                    $user = User::find($request->user_id);

                    $payment = Payment::create([
                            'user_id' => $request->user_id,
                            'advertfee_id' => $request->advertfee_id,
                            'company_id' => $advert->company_id,
                            'cost' => $request->cost,
                            'amount' => $request->amount,
                            'quantity' => $request->quantity,
                            'currency' => 'NG',
                            'status' => 'Unconfirmed',
                            'description' => $request->reference,
                            'purpose' => $request->email
                        ]);

                    $transaction = Transaction::create([
                            'user_id' => $request->user_id,
                            'advertfee_id' => $request->advertfee_id,
                            'company_id' => $advert->company_id,
                            'payment_id' => $payment->id,
                            'advert_id' => $request->advert_id,
                            'cost' => $request->cost,
                            'item' => $request->product_id,
                            'item_id' => $request->product_id,
                            'item_category' => $advert->category_id,
                            'amount' => $request->amount,
                            'quantity' => $request->sex,
                            'currency' => $request->email,
                            'status' => $request->email,
                            'description' => $request->reference,
                            'purpose' => $request->email
                        ]);

                    $payment = Payment::find($payment->id);
                    $payment->status = 'Confirmed';
                    $payment->save();

                    $advert = Advert::find($request->advert_id);
                    $advert->paid = 'YES';
                    $advert->save();

                try{


                    return Paystack::getAuthorizationUrl()->redirectNow();

                    


                }catch(\Exception $e) {
                    return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
                } 

    }


    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }


}
