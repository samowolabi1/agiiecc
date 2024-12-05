<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class NoticeController extends Controller
{
    public function index(){

        $notices = Notice::all();


        return Response::json([
                'status' => 201,
                'notices' => $notices
            ]);


    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

       $notices = notice::create($request->all());

       return Response::json([
                'status' => 201,
                'notices' => $notices
            ]);


         
    }

    public function show($id){

        $notice = Notice::find($id);

        return Response::json([
                'status' => 201,
                'notice' => $notice
            ]);
    }

    public function edit($id){

        $notice = Notice::find($id);

        return Response::json([
                'status' => 201,
                'notice' => $notice
            ]);
    }

    public function update(Request $request, $id){

        $notice = Notice::find($id);
        $notice->update($request->all());

        return Response::json([
                'status' => 201,
                'notices' => $notice
            ]);
    }

    public function destroy($id){
        $notice = Notice::destroy($id);

        return Response::json([
                'status' => 201,
                'success' => "Deleted Succesfully"
            ]);
    }
}
