<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sibling;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class SiblingController extends Controller
{
    public function index(){

        $userid = Auth::id();

        $siblings  = Sibling::where('user_id',$userid)->get();


        return response([
                'siblings' => $siblings
            ], 200);
    }


    public function store(Request $request){
        
        $rules = array(
            'user_id' => 'required|exists:App\Models\User,id',
            'firstname' => 'required',
            'lastname' => 'required',
            'dob' => 'required',
           
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }else{
        
             $sibling = Sibling::create([

                'user_id' => $request->user_id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'dob' => $request->dob,
                'gender' => $request->gender,
            ]);
        
            }

            return Response::json([
                'status' => 201,
                'sibling' => $sibling
            ]);


        
    }

    public function show($id){

        $sibling = Sibling::find($id);

        return response([
                'sibling' => $sibling
            ], 200);
    }
}
