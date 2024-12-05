<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emergency;
use App\Models\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Auth;

class EmergencyController extends Controller
{
    public function index(){

        $userid = Auth::id();

        $emergencys  = Emergency::where('user_id',$userid)->get();


        return response([
                'emergencys' => $emergencys
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
        
            $emergency = Emergency::create([

                'user_id' => $request->user_id,
                'title' => $request->title,
                'fullname' => $request->fullname,
                'surname' => $request->surname,
                'otherName' => $request->otherName,
                'type' => $request->type,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'pob' => $request->pob,
                'addressInNigeria' => $request->addressInNigeria,
                'stateOfOrigin' => $request->stateOfOrigin,
                'lga' => $request->lga,
                'phone' => $request->phone,
                'occupation' => $request->occupation,
                'permanentAddress' => $request->permanentAddress,
                'country' => $request->country,
                'whereYouReside' => $request->whereYouReside,
                'postcode' => $request->postcode,
                'reasonInUk' => $request->reasonInUk,
                'reasonFofRequest' => $request->reasonFofRequest,
                'passportNo' => $request->passportNo,
                'dateOfIssue' => $request->dateOfIssue,
                'placeOfIssue' => $request->placeOfIssue,
                'kinSurname' => $request->kinSurname,
                'kinOthername' => $request->kinOthername,
                'kinGender' => $request->kinGender,
                'kinAddress' => $request->kinAddress,
                'kinStateOfOrigin' => $request->kinStateOfOrigin,
                'kinLga' => $request->kinLga,
                'kinEmail' => $request->kinEmail,
                'kinOccupation' => $request->kinOccupation,
                'kinCountry' => $request->kinCountry,
                'kinRelationship' => $request->kinRelationship,
                'kinrefreeName' => $request->kinrefreeName,
                'refreeCity' => $request->refreeCity,
                'refreePostcode' => $request->refreePostcode
            ]);

            $new_citi_id = $emergency->id;

            return Response::json([
                'status' => 201,
                'emergency' => $emergency
            ]);


        
    }
}

    public function show($id){

        $emergency = Emergency::find($id);

        return response([
                'emergency' => $emergency
            ], 200);
    }
}
