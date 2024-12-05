<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();


        return Response::json([
                'status' => 201,
                'products' => $products
            ]);


    }

    public function store(Request $request){

              

        $rules = array(
            'user_id' => 'required|integer',
            'title' => 'required|string',
            'cost' => 'required|integer',
            'description' => 'required|string',
    );

    $validator = Validator::make($request->all(), $rules);
   

        if ($validator->fails()) {

            return response([
                'error_msg' => $validator->errors()
            ], 400);
        
        }else{
        
            $product = Product::create([

                'user_id' => $request->user_id,
                'title' => $request->title,
                'cost' => $request->cost,
                'description' => $request->description,
                'status' => "Inactive",
            ]);
    
    }

            return Response::json([
                'status' => 201,
                'product' => $product
            ]);

         
    }

    public function show($id){

        $product = Product::find($id);

        return Response::json([
                'status' => 201,
                'product' => $product
            ]);
    }



    public function edit($id){

        $product = Product::find($id);

        return Response::json([
                'status' => 201,
                'product' => $product
            ]);
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
        $product->update($request->all());

        return Response::json([
                'status' => 201,
                'products' => $product
            ]);
    }

    public function destroy($id){
        $product = Product::destroy($id);

        return Response::json([
                'status' => 201,
                'success' => "Deleted Succesfully"
            ]);
    }
}
