<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pensioner;
use App\Models\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Auth;

class PensionerController extends Controller
{
    
        public function index(){

            $userid = Auth::id();

        $Pensioners  = Pensioner::where('user_id',$userid)->get();


        return response([
                'Pensioners' => $Pensioners
            ], 200);
    }


    public function store(Request $request){

        //return "khkjhll";
        
        $rules = array(
            'user_id' => 'required|exists:App\Models\User,id',
            // 'form_id' => 'required|exists:App\Models\Form,id',
            // 'fullname' => 'required|string',
            // 'maidenName' => 'required|string',
            // 'address' => 'required|string',
            // 'telNo' => 'required|string',
            // 'nationality' => 'required|string',
            // 'dob' => 'required|string'
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }else{
        
           $pensioner = Pensioner::create([

                'user_id' => Auth::id(),
                'title' => $request->title,
            ]);
        
            }

            $new_citi_id = $Pensioner->id;

            return Response::json([
                'status' => 201,
                'pensioner' => $Pensioner
            ]);


        
    }

    public function show($id){

        $Pensioner = Pensioner::find($id);

        return response([
                'pensioner' => $Pensioner
            ], 200);
    }

}
