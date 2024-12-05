<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;
use App\Illuminate\Http\Response;
use Auth;

class FormController extends Controller
{
    
    public function index(){

        $forms = Form::all();


        return Response::json([
                'forms' => $forms
            ],200);


    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);


       $forms = Form::create($request->all());

       return Response::json([
                'forms' => $forms
            ],201);


         
    }

    public function show($id){

        $form = Form::find($id);

        return Response::json([
                'status' => 201,
                'form' => $form
            ]);
    }

    public function edit($id){

        $form = Form::find($id);

        return Response::json([
                'status' => 201,
                'form' => $form
            ]);
    }

    public function update(Request $request, $id){

        $form = Form::find($id);
        $form->update($request->all());

        return Response::json([
                'status' => 201,
                'forms' => $form
            ]);
    }

    public function destroy($id){
        $form = Form::destroy($id);

        return Response::json([
                'status' => 201,
                'success' => "Deleted Succesfully"
            ]);
    }
}
