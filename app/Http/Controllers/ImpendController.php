<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Impend;
use App\Models\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Auth;

class ImpendController extends Controller
{
    public function index(){

        $userid = Auth::id();

        $impends  = Impend::where('user_id',$userid)->get();


        return response([
                'impends' => $impends
            ], 200);
    }


    public function store(Request $request){

        //return "khkjhll";
        
        $rules = array(
            'user_id' => 'required|exists:App\Models\User,id',
            // 'form_id' => 'required|exists:App\Models\Form,id',
           
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }else{
        
             $impend = Impend::create([

                'user_id' => $request->user_id
            ]);
        
            }

            $new_citi_id = $impend->id;

            return Response::json([
                'status' => 201,
                'impend' => $impend
            ]);


        
    }

    public function show($id){

        $impend = Impend::find($id);

        return response([
                'impend' => $impend
            ], 200);
    }
}
