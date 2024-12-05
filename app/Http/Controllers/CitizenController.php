<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Citizen;
use App\Models\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Auth;

class CitizenController extends Controller
{
    public function index(){

        $userid = Auth::id();

        $citizens  = Citizen::where('user_id',$userid)->get();


        return response([
                'citizens' => $citizens
            ], 200);
    }


    public function store(Request $request){

        //return "khkjhll";
        
        $rules = array(
            'user_id' => 'required|exists:App\Models\User,id',
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
        
            $citizen = Citizen::create($request->all());
        
            }

            $new_citi_id = $citizen->id;

            return Response::json([
                'status' => 201,
                'citizen' => $citizen
            ]);


        
    }

    public function show($id){

        $citizen = Citizen::find($id);

        return response([
                'citizen' => $citizen
            ], 200);
    }
}
