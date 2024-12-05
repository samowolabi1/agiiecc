<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\Returnpass;

class ReturnpassController extends Controller
{
    public function index(){

        $returnpass  = Returnpass::all();


        return response([
                'Returnpasss' => $returnpass
            ], 200);

    }


    public function store(Request $request){

        //return "khkjhll";
        
        $rules = array(
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'passportNo' => 'required|string',
        );

        $validator = Validator::make($request->all(), $rules);
       
 
        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }else{
        
            $returnpass = Returnpass::create([
                'user_id' => Auth::id(),
                'fisrtname' => $request->firstname,
                'lastname' => $request->lastname,
                'passportNo' => $request->passportNo,
            ]);


            return Response::json([
                'status' => 201,
                'Returnpass' => $returnpass
            ]);
        }

        
    }

    public function show($id){

        $returnpass = Returnpass::find($id);

        return response([
                'Returnpass' => $returnpass
            ], 200);
    }


    public function delete($id){

        $returnpass = Returnpass::find($id);
        $returnpass->delete();

        return response([
                'msg' => 'Deleted succesfully'
            ], 200);
    }
}
