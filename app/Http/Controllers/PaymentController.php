<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Models\Payment;
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

    private function createToken($cardData){
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }


    private function createCharge($tokenId, $amount, $description){
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => $description
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }

    ///paystack

     public function redirectToGateway(Request $request)
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    public function handleGatewayCallback()
    {
     //Getting authenticated user 
        $id = Auth::id();
        // Getting the specific student and his details
        $student = Student::where('user_id',$id)->first();
        $class_id = $student->class_id;
        $section_id = $student->section_id; 
        $level_id = $student->level_id; 
        $student_id = $student->id; 
        
        $paymentDetails = Paystack::getPaymentData(); //this comes with all the data needed to process the transaction
        // Getting the value via an array method
        $inv_id = $paymentDetails['data']['metadata']['invoiceId'];// Getting InvoiceId I passed from the form
        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        $amount = $paymentDetails['data']['amount']; //Getting the Amount
        $number = $randnum = rand(1111111111,9999999999);// this one is specific to application
        $number = 'year'.$number;
        // dd($status);
        if($status == "success"){ //Checking to Ensure the transaction was succesful
          
            Payment::create(['student_id' => $student_id,'invoice_id'=>$inv_id,'amount'=>$amount,'status'=>1]); // Storing the payment in the database
            Student::where('user_id', $id)
                  ->update(['register_no' => $number,'acceptance_status' => 1]);
                  
            return view('student.studentFees'); 
        }
      
        // Now you have the payment details,
        // you can store the authorization_code in your DB to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }


}
