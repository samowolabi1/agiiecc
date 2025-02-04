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


    public function admin_store(Request $request)
        {
            

            $rules = [
                'name' => 'required|string',
                'price' => 'required|integer',
                'description' => 'required|string',
                'short_description' => 'required|string',
                'type_id' => 'required|integer',
                'size_id' => 'required|array',
                'color_id' => 'required|array',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response([
                    'error_msg' => $validator->errors(),
                ], 400);
            }

           
            $userid = $request->userId;
            $user = User::find($userid);

                if (!$user || !$user->company) {
                   
                    return 'User does not belong to any company.';
                }

            $companyId = $user->company->id;
            $colorIds = $request->color_id;
            $sizeIds = $request->size_id;

            //return $userid." :".$companyId;

            DB::beginTransaction();


            try {

                $advert = Advert::create([
                    'user_id' => $userid,
                    'company_id' => $companyId,
                    'advertfee_id' => 1,
                    'category_id' => Session::get('category_id'),
                    'status' => 'INACTIVE',
                    'approved' => 'NO',
                    'paid' => 'NO',
                ]);

                //return $userid." :".$companyId;
                

                $product = Product::create([
                    'user_id' => $userid,
                    'company_id' => $companyId,
                    'type_id' => $request->type_id,
                    'advert_id' => $advert->id,
                    'size_id' => $sizeIds[0], // First size
                    'color_id' => $colorIds[0], // First color
                    'name' => $request->name . '-' . rand(4, 50),
                    'price' => $request->price,
                    'description' => $request->description,
                    'short_description' => $request->short_description,
                    'status' => 'INACTIVE',
                ]);

                 

                Session::put('product_id', $product->id);
                Session::put('user_id', $userid);

                $productColors = array_map(function ($colorId) use ($product, $advert, $companyId) {

                    $color = Color::findOrFail($colorId);
                    return [
                        'user_id' => Session::get('user_id'),
                        'company_id' => $companyId,
                        'product_id' => $product->id,
                        'advert_id' => $advert->id,
                        'name' => $color->name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $colorIds);
                Productcolor::insert($productColors);

                $productSizes = array_map(function ($sizeId) use ($product, $advert, $companyId) {
                    $size = Size::findOrFail($sizeId);
                    return [
                        'user_id' => Session::get('user_id'),
                        'company_id' => $companyId,
                        'product_id' => $product->id,
                        'advert_id' => $advert->id,
                        'name' => $size->name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $sizeIds);
                Productsize::insert($productSizes);

                DB::commit();

                Session::forget('category_id');
                Session::forget('product_id');
                Session::forget('user_id');

                //$itemRoute = "admin.product.show,".$product->id;
                $itemId = 1;

                return view('vendors.imageupload1', ['productId' => $product->id,'user' => $user, 'itemId' => $itemId]);

            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error('Transaction failed: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }

        }



    public function store(Request $request)
        {
            $rules = [
                'name' => 'required|string',
                'price' => 'required|integer',
                'description' => 'required|string',
                'short_description' => 'required|string',
                'type_id' => 'required|integer',
                'size_id' => 'required|array',
                'color_id' => 'required|array',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response([
                    'error_msg' => $validator->errors(),
                ], 400);
            }

            $user = Auth::user();
            if (!$user->company) {
                return response()->json(['success' => false, 'message' => 'User does not belong to any company.'], 400);
            }

            $companyId = $user->company->id;
            $colorIds = $request->color_id;
            $sizeIds = $request->size_id;

            DB::beginTransaction();

            try {
                $advert = Advert::create([
                    'user_id' => Auth::id(),
                    'company_id' => $companyId,
                    'advertfee_id' => 1,
                    'category_id' => Session::get('category_id'),
                    'status' => 'INACTIVE',
                    'approved' => 'NO',
                    'paid' => 'NO',
                ]);

                $product = Product::create([
                    'user_id' => Auth::id(),
                    'company_id' => $companyId,
                    'type_id' => $request->type_id,
                    'advert_id' => $advert->id,
                    'size_id' => $sizeIds[0], // First size
                    'color_id' => $colorIds[0], // First color
                    'name' => $request->name . '-' . rand(4, 50),
                    'price' => $request->price,
                    'description' => $request->description,
                    'short_description' => $request->short_description,
                    'status' => 'INACTIVE',
                ]);

                Session::put('product_id', $product->id);

                $productColors = array_map(function ($colorId) use ($product, $advert, $companyId) {
                    $color = Color::findOrFail($colorId);
                    return [
                        'user_id' => Auth::id(),
                        'company_id' => $companyId,
                        'product_id' => $product->id,
                        'advert_id' => $advert->id,
                        'name' => $color->name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $colorIds);
                Productcolor::insert($productColors);

                $productSizes = array_map(function ($sizeId) use ($product, $advert, $companyId) {
                    $size = Size::findOrFail($sizeId);
                    return [
                        'user_id' => Auth::id(),
                        'company_id' => $companyId,
                        'product_id' => $product->id,
                        'advert_id' => $advert->id,
                        'name' => $size->name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }, $sizeIds);
                Productsize::insert($productSizes);

                DB::commit();
                Session::forget('category_id');

                return view('images.newimg', ['productId' => $product->id]);

            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error('Transaction failed: ' . $e->getMessage());
                return response()->json(['success' => false, 'message' => 'An error occurred while creating the product.'], 500);
            }

        }


    public function prodview($id){

        $product = Product::find($id);

        return Response::json([
                'status' => 201,
                'product' => $product
            ]);
    }

    public function admin_product_show($id){

        //return $id;

        $product = Product::find($id);
        $vendor = User::where('id',$product->user_id)->first();
        $company = Company::where('id',$product->company_id)->first();
        $categories = Category::all();

        return view('product.adminshow',compact('product','vendor','company','categories'));
    }

    Public function admin_approve_product($id){

        $prods = Product::find($id);
        $advertid = Advert::where('id',$prods->advert_id)->first();


                 if ($prods->approved == 'YES'){

                        if ($prods->status == 'Active') {
                        
                            return redirect()->back()->with('error','Product must be Inactive');
                        
                        }

                        $prods->approved = 'NO';
                        $prods->save();

                        $advertid->level = 'LEVEL 1';
                        $advertid->save();


                 }else{

                    
                        $prods->approved = 'YES';
                        $prods->save();

                        $advertid->level = 'LEVEL 2';
                        $advertid->save();
                 }

        return redirect()->back()->with('success','Updated Succesfully');

    }

    Public function admin_status_product($id){

         $prods = Product::find($id);
         $advertid = Advert::where('id',$prods->advert_id)->first();

         if ($prods->approved == 'NO') {
                        
                return redirect()->back()->with('error','Product must be Approved');
            
            }

         if ($prods->status == 'Active'){

            $prods->status = 'Inactive';
            $prods->save();

            $advertid->level = 'LEVEL 2';
            $advertid->save();

         }else{

            $prods->status = 'Active';
            $prods->save();

            $advertid->level = 'LEVEL 3';
            $advertid->save();
         }

         

        return redirect()->back()->with('success','Updated Succesfully');

    }

    public function adminprodview($id){

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
