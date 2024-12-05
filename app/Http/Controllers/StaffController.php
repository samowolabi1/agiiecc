<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Staff;
use Auth;

class StaffController extends Controller
{
    public function index(){

        $staffs = Staff::all();


        return Response::json([
                'status' => 201,
                'staffs' => $staffs
            ]);


    }

    public function store(Request $request){
       

        $rules = array(
            'user_id' => 'required|integer',
            'department_id' => 'required|integer',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
    );

    $validator = Validator::make($request->all(), $rules);
   

        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }else{
        
            $staff = Staff::create([

                'user_id' => $request->user_id,
                'department_id' => $request->department_id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
            ]);
    
    }

            return Response::json([
                'status' => 201,
                'staff' => $staff
            ]);

         
    }

    public function show($id){

        $staff = Staff::find($id);

        return Response::json([
                'status' => 201,
                'staff' => $staff
            ]);
    }

    public function edit($id){

        $staff = Staff::find($id);

        return Response::json([
                'status' => 201,
                'staff' => $staff
            ]);
    }

    public function update(Request $request, $id){

        $staff = Staff::find($id);
        $staff->update($request->all());

        return Response::json([
                'status' => 201,
                'staffs' => $staff
            ]);
    }

    public function destroy($id){
        $staff = Staff::destroy($id);

        return Response::json([
                'status' => 201,
                'success' => "Deleted Succesfully"
            ]);
    }
}
