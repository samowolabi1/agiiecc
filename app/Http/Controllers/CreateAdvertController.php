<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\User;
use App\Models\Color;
use App\Models\Size;
use App\Models\Type;
use App\Models\Sevicetype;
use App\Models\Ridetype;
use App\Models\Cartype;
use App\Models\Carbrand;
use App\Models\State;

use App\Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Service;
use App\Models\Productcolor;
use App\Models\Productsize;
use App\Models\Image;
use App\Models\Ride;
use App\Models\Advert;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;


class CreateAdvertController extends Controller
{
    public function selectAds(Request $request)
    {

        session()->put('category_id', $request->category_id);

        if (!session()->has('category_id')) {
            if (empty($request->category_id)) {
                return redirect()->back()->with('error', 'No data is supplied');
            }

            $rules = [
                'category_id' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
        }


        $user = User::find($request->userId);



        $catId = session('category_id');

        if ($catId == 1) {

            $color = Color::all();
            $size = Size::all();
            $type = Type::all();

            $category = Category::find($request->category_id);

            Session::put('category_id', $request->input('category_id'));
            Session::put('category_name', $category->name);

            //$SessioncatId = Session::get('category_id');

            return view('adverts.vendoradvert1', compact('size', 'color', 'type', 'user'));


        } else if ($catId == 2) {

            $servicetypes = Sevicetype::all();

            $category = Category::find($request->category_id);

            Session::put('category_id', $request->input('category_id'));
            Session::put('category_name', $category->name);
            return view('adverts.vendorservice', compact('servicetypes', 'user'));



        } else if ($catId == 3) {

            $ridetypes = Ridetype::all();
            $carbrands = Carbrand::all();
            $cartypes = Cartype::all();
            $states = State::all();
            $colors = Color::all();

            $category = Category::find($request->category_id);

            Session::put('category_id', $request->input('category_id'));
            Session::put('category_name', $category->name);

            return view('adverts.vendorride', compact('ridetypes', 'cartypes', 'carbrands', 'states', 'colors', 'user'));



        }

        return redirect()->back()->withErrors($validator)->withInput();

    }


    public function createadsproduct(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'ProductCategory' => 'required|integer',
            'ProductSize' => 'required|array',
            'color_id' => 'required|array',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $userid = $request->userId;
        $user = User::find($userid);

        if (!$user || !$user->company) {
            return back()->with('error', 'User does not belong to any company.');
        }

        $companyId = $user->company->id;
        $colorIds = $request->color_id;
        $sizeIds = $request->ProductSize;

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

            $product = Product::create([
                'user_id' => $userid,
                'company_id' => $companyId,
                'type_id' => $request->ProductCategory,
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

            $itemId = 1;

            return redirect()->route('vendoradvertuploadimage', [
                'productId' => $product->id,
                'user' => $user->id,
                'itemId' => $itemId
            ]);

            // return view('adverts.vendoradvertuploadimage', ['productId' => $product->id, 'user' => $user, 'itemId' => $itemId]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Transaction failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    ///upload picture for product
    public function product_uploadImages(Request $request)
    {
        //return $request->all();
        // Validate the uploaded files
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        $userid = $request->userId;
        $productid = $request->productId;
        $categoryid = $request->itemId;
        $user = User::find($userid);

        if (!$user || !$user->company) {

            return response()->json(['success' => false, 'message' => 'User does not belong to any company.'], 400);
        }

        $companyId = $user->company->id;



        DB::beginTransaction(); // Start transaction

        try {

            //   dd( $userid .$productid . $categoryid . $companyId);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    // Generate a unique name for the image
                    $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                    // Store the image in the folder
                    $path = $image->storeAs('uploads/images', $newName, 'public');

                    // Check if the file was successfully stored
                    if (!$path) {
                        throw new \Exception("Failed to store the image.");
                    }

                    // Save image details in the database
                    Image::create([
                        'user_id' => $userid,
                        'company_id' => $companyId, // Nullable company ID
                        'category_id' => $categoryid ?? null, // Nullable company ID
                        'product_id' => $productid, // Set product_id based on your logic
                        'image_name' => $image->getClientOriginalName(), // Original file name
                        'new_name' => $newName, // New file name
                        'status' => 'Inactive', // Example status
                        'approved' => 'No', // Example approval status
                        'edited' => 'No', // Example edited status
                        'extension' => $image->getClientOriginalExtension(), // File extension
                        'created_by' => $user->name ?? 'System', // User who uploaded
                        'description' => 'Uploaded via multi-upload form', // Example description
                    ]);
                }


            }

            DB::commit(); // Commit transaction if everything is successful

            //return "Successfull";

            return redirect()->route('view_product_ads', $userid)->with('success', 'Successfully Created!');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error

            // Log the error for debugging
            \Log::error('Image upload error: ' . $e->getMessage());


            // Return an error message
            return back()->with('error', 'An error occurred while uploading images. Please try again.');
        }
    }


    public function view_product_ads($id)
    {

        $products = Product::where('user_id', $id)->get();
        $services = Service::where('user_id', $id)->get();
        $rides = Ride::where('user_id', $id)->get();
        $user = User::Find($id);

        //return $products;

        return view('adverts.vendorproduct', compact('products', 'services', 'rides', 'user'));

    }


    public function vendorAdvertUploadImage(Request $request)
    {
        $productId = $request->query('productId');
        $user = User::find($request->query('user'));
        $itemId = $request->query('itemId');
        $service = $request->query('service');

        return view('adverts.vendoradvertuploadimage', compact('productId', 'user', 'itemId', 'service'));
    }


    public function show_single_ads($id)
    {

        //return $id;

        $product = Product::find($id);
        $vendor = User::where('id', $product->user_id)->first();
        $company = Company::where('id', $product->company_id)->first();
        $categories = Category::all();

        return view('adverts.vendorshowsingleproduct', compact('product', 'vendor', 'company', 'categories'));
    }

    public function show_single_ads_service($id)
    {

        //return $id;

        $service = Service::find($id);
        $vendor = User::where('id', $service->user_id)->first();
        $company = Company::where('id', $service->company_id)->first();
        $categories = Category::all();

        return view('adverts.vendorshowsingleservice', compact('service', 'vendor', 'company', 'categories'));
    }

    public function show_single_ads_ride($id)
    {

        //return $id;

        $ride = Ride::find($id);
        $vendor = User::where('id', $ride->user_id)->first();
        $company = Company::where('id', $ride->company_id)->first();
        $categories = Category::all();

        return view('adverts.vendorshowsingleride', compact('ride', 'vendor', 'company', 'categories'));
    }



}
