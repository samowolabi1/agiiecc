<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Productsize;
use App\Models\Color;
use App\Models\Size;
use App\Models\Advert;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;

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
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'description' => 'required|string',
            'type_id' => 'required|integer',
            'size_id' => 'required',
            'color_id' => 'required'
    );

            $validator = Validator::make($request->all(), $rules);
           

                if ($validator->fails()) {

                    return response([
                        'error_msg' => $validator->errors()
                    ], 400);
                
                }else{

                    DB::beginTransaction(); // Start transaction

            try {

                // Extract necessary IDs
                $colorIds = $request->color_id;
                $sizeIds = $request->size_id;
                $companyId = Auth::user()->company->id;

                // Create an advert
                $advert = Advert::create([
                    'user_id' => Auth::id(),
                    'company_id' => $companyId,
                    'category_id' => Session::get('category_id'),
                    'status' => 'INACTIVE',
                    'approved' => 'NO',
                    'paid' => 'NO',
                ]);

                // Create a product
                $product = Product::create([
                    'user_id' => Auth::id(),
                    'company_id' => $companyId,
                    'type_id' => $request->type_id,
                    'advert_id' => $advert->id,
                    'size_id' => $sizeIds[0], // First size
                    'color_id' => $colorIds[0], // First color
                    'name' => $request->name.'-'. rand(4,50),
                    'price' => $request->price,
                    'description' => $request->description,
                    'short_description' => $request->short_description,
                    'status' => 'INACTIVE',
                ]);

                $productId = $product->id;

                 Session::put('product_id', $product->id);

                // Create product colors
                $productColors = array_map(function ($colorId) use ($product, $advert, $company) {
                    $color = Color::findOrFail($colorId); // Throws an exception if not found
                    return [
                        'user_id' => Auth::id(),
                        'company_id' => $company->id,
                        'product_id' => $product->id,
                        'advert_id' => $advert->id,
                        'name' => $color->name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $colorIds);
                Productcolor::insert($productColors);

                // Create product sizes
                $productSizes = array_map(function ($sizeId) use ($product, $advert, $company) {
                    $size = Size::findOrFail($sizeId); // Throws an exception if not found
                    return [
                        'user_id' => Auth::id(),
                        'company_id' => $company->id,
                        'product_id' => $product->id,
                        'advert_id' => $advert->id,
                        'name' => $size->name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $sizeIds);
                Productsize::insert($productSizes);

                DB::commit(); // Commit transaction if all operations are successful

               // return response()->json(['success' => true, 'message' => 'Product and advert created successfully!']);


            } catch (\Exception $e) {
                DB::rollBack(); // Roll back transaction in case of error

                // Log the error for debugging (optional)
                \Log::error('Transaction failed: ' . $e->getMessage());

                return response()->json(['success' => false, 'message' => 'An error occurred while creating the product.'], 500);
            }
        }

        return view('images.newimg', compact('productId'));

           //return redirect()->route('my.adverts')->with('success','Product and advert created successfully!');

         
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
