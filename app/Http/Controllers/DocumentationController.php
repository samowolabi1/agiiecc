<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Models\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Auth;

class DocumentationController extends Controller
{
    public function index(){

        $userid = Auth::id();

        $documentations  = Documentation::where('user_id',$userid)->get();


        return response([
                'documentations' => $documentations
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
        
            $documentation = Documentation::create($request->all());
        
            }

            $new_citi_id = $documentation->id;

            return Response::json([
                'status' => 201,
                'documentation' => $documentation
            ]);


        
    }

    public function show($id){

        $documentation = Documentation::find($id);

        return response([
                'documentation' => $documentation
            ], 200);
    }
}
