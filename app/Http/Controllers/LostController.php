<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Police;
use App\Models\File;
use App\Models\Lost;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Auth;

class LostController extends Controller
{
    public function index(){

        $losts  = Lost::all();


        return response([
                'losts' => $losts
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
        
            $lost = Lost::create([
                'user_id' => Auth::id(),
                'fisrtname' => $request->firstname,
                'lastname' => $request->lastname,
                'passportNo' => $request->passportNo,
            ]);


            return Response::json([
                'status' => 201,
                'lost' => $lost
            ]);
        }

        
    }

    public function show($id){

        $lost = Lost::find($id);

        return response([
                'lost' => $lost
            ], 200);
    }


    public function delete($id){

        $lost = Lost::find($id);
        $lost->delete();

        return response([
                'msg' => 'Deleted succesfully'
            ], 200);
    }
}
