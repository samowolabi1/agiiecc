<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Auth;

class StudentController extends Controller
{
       

    public function index(){

        $userid = Auth::id();

        $students = Student::where('user_id',$userid)->get();

        return Response::json([
                'status' => 201,
                'students' => $students
            ]);

    }

    public function store(Request $request){

    $rules = array(
            'studentNo' => 'required|string',
            'university' => 'required|string',
            'course' => 'required|string',
            'schoollocation' => 'required|string',
            'courseStartDate' => 'required|date',
            'schooltown' => 'required|string',
            'courseEndDate' => 'required|date',
            'postcode' => 'required|string',
            'declare' => 'required|string',
    );

    $validator = Validator::make($request->all(), $rules);
   

        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }else{
        
            $student = student::create([
                'user_id' => Auth::id(),
                'studentNo' => $request->studentNo,
                'university' => $request->university,
                'course' => $request->course,
                'sschoollocation' => $request->schoollocation,
                'courseStartDate' => $request->courseStartDate,
                'schooltown' => $request->schooltown,
                'courseEndDate' => $request->courseEndDate,
                'postcode' => $request->postcode,
                'declare' => $request->declare
            ]);
    
    }

            return Response::json([
                'status' => 201,
                'student' => $student
            ]);

               
    }

    public function show($id){

        $student = Student::find($id);

        return Response::json([
                'status' => 201,
                'student' => $student
            ]);
    }

    public function update(Request $request, $id){

        $student = Student::find($id);
        $student->update($request->all());

        return Response::json([
                'status' => 201,
                'student' => $student
            ]);
    }


    public function destroy($id){

        $student = Student::destroy($id);

        return Response::json([
                'status' => 201,
                'success' => 'Record is Deleted'
            ]);
    }
}
