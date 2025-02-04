<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Company;
use App\Models\Advert;
use App\Models\Advertfee;
use App\Models\User;
use App\Models\Color;
use App\Models\Size;
use App\Models\Type;
use App\Models\Sevicetype;
use App\Models\Ridetype;
use App\Models\Cartype;
use App\Models\Carbrand;
use App\Models\State;
use App\Models\Product;
use App\Models\Service;
use App\Models\Ride;
use Auth;
use Illuminate\Support\Facades\Session;

class AdvertController extends Controller
{
    //


    public function user_ads(){

        $categories = Category::all();

        return view('adverts.user_ads', compact('categories'));
        
    }


    public function active_ads(){

        $activeAds = Advert::where('status','ACTIVE')->where('approved','YES')->where('paid','YES')->get();


        return view('adverts.adminactive', compact('activeAds'));

    }

    public function inactive_ads(){

        $inactiveAds = Advert::where('status','INACTIVE')->where('approved','YES')->get();


        return view('adverts.admininactive', compact('inactiveAds'));

    }


    public function unapproved_active_ads(){

        $unapprovedAds = Advert::where('approved','NO')->where('paid','YES')->get();


        return view('adverts.admininunapproved', compact('unapprovedAds'));

    }


    public function payment_pending(){

        $unpaidads = Advert::where('level','LEVEL 3')->get();


        return view('adverts.pendingpayments', compact('unpaidads'));

    }


    public function show_ads($id){

        $adverts = Advert::find($id);
        $advertfee = Advertfee::all();

        //return $products;

        return view('adverts.show', compact('adverts','advertfee'));

    }


    public function new_ads(){

        $categories = Category::all();

        return view('adverts.user_ads', compact('categories'));
        
    }

    public function vend_items($id){

        $products = Product::where('user_id',$id)->get();
        $services = Service::where('user_id',$id)->get();
        $rides = Ride::where('user_id',$id)->get();
        $user = User::Find($id);

        //return $products;

        return view('vendors.venditems', compact('products','services','rides','user'));

    }

    public function admin_ven_cat(Request $request){

        //return $request->all();

            if($request->category_id == ""){

                return redirect()->back()->with('error','No data is supplied');
            }

        $user = User::find($request->userId);

        $rules = [
                
                 'category_id' => 'required',

                ];

            $validator = Validator::make($request->all(), $rules);

        $catId = $request->category_id;

        if ($catId == 1) {
                // code...

                $color = Color::all();
                $size = Size::all();
                $type = Type::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

                //$SessioncatId = Session::get('category_id');

                return view('vendors.prod1', compact('size','color','type','user'));


            }else if ($catId == 2) {
                
                $servicetypes = Sevicetype::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

                return view('vendors.serve1', compact('servicetypes','user'));



            }else if ($catId == 3) {
                
                $ridetypes = Ridetype::all();
                $carbrands = Carbrand::all();
                $cartypes = Cartype::all();
                $states = State::all();
                $colors = Color::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

                return view('vendors.ride1', compact('ridetypes','cartypes','carbrands','states','colors','user'));



        }

            return redirect()->back()->withErrors($validator)->withInput();

        
        
    }

    public function store(Request $request){

        //return $request->all();

        $this->validate($request, [

                'category_id' => 'required',
                ]);

        $catId = $request->category_id;

        if ($catId == 1) {
                // code...

                $color = Color::all();
                $size = Size::all();
                $type = Type::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

                //$SessioncatId = Session::get('category_id');

                return view('product.newproduct1', compact('size','color','type'));


            }else if ($catId == 2) {
                
                $servicetypes = Sevicetype::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

                return view('service.newservice1', compact('servicetypes'));



            }else if ($catId == 3) {
                
                $ridetypes = Ridetype::all();
                $carbrands = Carbrand::all();
                $cartypes = Cartype::all();
                $states = State::all();
                $colors = Color::all();

                $category = Category::find($request->category_id);

                Session::put('category_id', $request->input('category_id'));
                Session::put('category_name', $category->name);

                return view('ride.newride1', compact('ridetypes','cartypes','carbrands','states','colors'));



        }

            return redirect()->back()->withErrors($validator)->withInput();

        
        
    }

    //approval and status

    Public function admin_approve_advert($id){

        $advert = Advert::find($id);

                if ($advert->level != 'LEVEL 3' ) {
                                
                        return redirect()->back()->with('error','Product is not ready or Paymnent is pending');
                    
                    }

                 if ($advert->approved == 'YES'){

                        if ($advert->status == 'Active') {
                        
                            return redirect()->back()->with('error','Advert must be Inactive first');
                        
                        }

                        $advert->approved = 'NO';
                        $advert->save();


                 }else{

                    if ($advert->paid != 'YES' ) {
                                
                        return redirect()->back()->with('error','Product is not ready or Paymnent is pending');
                    
                    }

                    
                        $advert->approved = 'YES';
                        $advert->save();
                 }

        return redirect()->back()->with('success','Updated Succesfully');

    }

    Public function admin_status_advert($id){

         $advert = Advert::find($id);

         if ($advert->approved == 'NO') {
                        
                return redirect()->back()->with('error','Product must be Approved');
            
            }

         if ($advert->status == 'Active'){

            $advert->status = 'Inactive';
            $advert->save();

         }else{

            $advert->status = 'Active';
            $advert->save();
         }

         

        return redirect()->back()->with('success','Updated Succesfully');

    }

    public function order_page($id){



         $adverts = Advert::find($id);

         if ($adverts->level != 'LEVEL 3') {
                        
                return redirect()->back()->with('error','Product must be in Level 3');
            
            }

        $advertfee = Advertfee::all();

        //return $products;

        return view('payment.orderpage', compact('adverts','advertfee'));
    }
}
