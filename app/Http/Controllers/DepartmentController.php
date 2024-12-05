<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class DepartmentController extends Controller
{
    //

    public function index(){

        $departments = Department::all();


        return Response::json([
                'status' => 201,
                'department' => $departments
            ]);

    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string',
        ]);

       $departments = Department::create($request->all());

       return Response::json([
                'status' => 201,
                'department' => $departments
            ]);


         
    }

    public function show($id){

        $department = Department::find($id);

        return Response::json([
                'status' => 201,
                'department' => $department
            ]);
    }

    public function edit($id){

        $department = Department::find($id);

        return Response::json([
                'status' => 201,
                'department' => $department
            ]);
    }

    public function update(Request $request, $id){

        $department = Department::find($id);
        $department->update($request->all());

        return Response::json([
                'status' => 201,
                'department' => $department
            ]);
    }

    public function destroy($id){

        $department = Department::destroy($id);

        return Response::json([
                'status' => 201,
                'success' => 'Record is Deleted'
            ]);
    }
}
