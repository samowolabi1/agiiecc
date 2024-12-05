<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Police;
use App\Models\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Auth;

class PoliceController extends Controller
{
        public function index(){

            $userid = Auth::id();

        $polices  = Police::all();


        return response([
                'Polices' => $polices
            ], 200);
    }


    public function store(Request $request){

        //return "khkjhll";
        
        $rules = array(
            'user_id' => 'required|exists:App\Models\User,id',
            'form_id' => 'required|exists:App\Models\Form,id',
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
        
            $police = Police::create($request->all());
        
            }

            $new_citi_id = $police->id;

            return Response::json([
                'status' => 201,
                'police' => $police
            ]);


        
    }

    public function show($id){

        $police = Police::find($id);

        return response([
                'police' => $police
            ], 200);
    }

}
