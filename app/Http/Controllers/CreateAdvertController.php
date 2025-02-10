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
use App\Models\Productcolor;
use App\Models\Productsize;
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
            return view('vendors.serve1', compact('servicetypes', 'user'));



        } else if ($catId == 3) {

            $ridetypes = Ridetype::all();
            $carbrands = Carbrand::all();
            $cartypes = Cartype::all();
            $states = State::all();
            $colors = Color::all();

            $category = Category::find($request->category_id);

            Session::put('category_id', $request->input('category_id'));
            Session::put('category_name', $category->name);

            return view('vendors.ride1', compact('ridetypes', 'cartypes', 'carbrands', 'states', 'colors', 'user'));



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

            return view('vendors.imageupload1', ['productId' => $product->id, 'user' => $user, 'itemId' => $itemId]);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Transaction failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }



}
