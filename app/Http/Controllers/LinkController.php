<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Facades\Validator;
use App\Illuminate\Http\Response;

class LinkController extends Controller
{
    //

    public function index(){

        $links = Link::all();



        return Response::json([
                'status' => 201,
                'links' => $links
            ]);


    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'link' => 'required',
        ]);

       $links = Link::create($request->all());

       return Response::json([
                'status' => 201,
                'links' => $links
            ]);


         
    }

    public function show($id){

        $link = Link::find($id);

        return Response::json([
                'status' => 201,
                'link' => $link
            ]);
    }

    public function edit($id){

        $link = Link::find($id);

        return Response::json([
                'status' => 201,
                'link' => $link
            ]);
    }

    public function update(Request $request, $id){

        $link = Link::find($id);
        $link->update($request->all());

        return Response::json([
                'status' => 201,
                'links' => $link
            ]);
    }

    public function destroy($id){
        $link = Link::destroy($id);

        return Response::json([
                'status' => 201,
                'success' => "Deleted Succesfully"
            ]);
    }

}
