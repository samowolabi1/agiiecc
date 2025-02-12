<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Advert;
use App\Models\Category;
use App\Models\Company;
use App\Models\Ride;
use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;


class RideController extends Controller
{
    //

    

    public function admin_store(Request $request){

       

         $rules = array(
            'name' => 'required|string',
            'cartype_id' => 'required|integer',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'servicetype_id' => 'required|integer',
            'spouse_phone_number' => 'required',
            'spouse_name' => 'required',
            'spouse_address' => 'required',
            'next_of_kin_name' => 'required',
            'next_of_kin_address' => 'required'
        );

          //return $request->all();
            $userid = $request->userId;

            $user = User::find($userid);

                if (!$user || !$user->company) {

                    return 'User or company not found.';
                }

                $companyId = $user->company->id;

          // Create an advert
                $advert = Advert::create([
                    'user_id' => $userid,
                    'company_id' => $companyId,
                    'advertfee_id' => 1,
                    'category_id' => Session::get('category_id'),
                    'status' => 'INACTIVE',
                    'approved' => 'NO',
                    'paid' => 'NO',
                ]);

            // Create a product
            $ride = Ride::create([
                'user_id' => $userid,
                'company_id' => $companyId,
                'sevicetype_id' => $request->servicetype_id,
                'advert_id' => $advert->id,
                'ridetype_id' => $request->ridetype_id,
                'cartype_id' => $request->cartype_id,
                'state_id' => $request->state_id,
                'color_id' => $request->color_id,
                'carbrand_id' => $request->carbrand_id,
                'name' => $request->name.'-'. rand(4,50),
                'price' => $request->price,
                'full_address' => $request->full_address,
                'short_description' => $request->short_description,
                'status' => 'INACTIVE',
                'next_of_kin_name' => $request->next_of_kin_name,
                'next_of_kin_address' => $request->next_of_kin_address,
                'next_of_kin_phone_number' => $request->next_of_kin_phone_number,
                'spouse_name' => $request->spouse_name,
                'spouse_address' => $request->spouse_address,
                'spouse_phone_number' => $request->spouse_phone_number,
                'car_plate_number' => $request->car_plate_number,
                'car_engine_number' => $request->car_engine_number,
                'license_number' => $request->license_number,
                'approved' => "NO",
            ]);

            $productId = $ride->id;
            $itemId = 1;
            Session::forget('category_id');

            return view('vendors.imageupload1',compact('productId','user','itemId'));


    }

    public function store(Request $request){

       

         $rules = array(
            'name' => 'required|string',
            'cartype_id' => 'required|integer',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'servicetype_id' => 'required|integer',
            'spouse_phone_number' => 'required',
            'spouse_name' => 'required',
            'spouse_address' => 'required',
            'next_of_kin_name' => 'required',
            'next_of_kin_address' => 'required'
        );

          //return $request->all();

           $companyId = Auth::user()->company->id;

          // Create an advert
                $advert = Advert::create([
                    'user_id' => Auth::id(),
                    'company_id' => $companyId,
                    'advertfee_id' => 1,
                    'category_id' => Session::get('category_id'),
                    'status' => 'INACTIVE',
                    'approved' => 'NO',
                    'paid' => 'NO',
                ]);

            // Create a product
            $ride = Ride::create([
                'user_id' => Auth::id(),
                'company_id' => $companyId,
                'sevicetype_id' => $request->servicetype_id,
                'advert_id' => $advert->id,
                'ridetype_id' => $request->ridetype_id,
                'cartype_id' => $request->cartype_id,
                'state_id' => $request->state_id,
                'color_id' => $request->color_id,
                'carbrand_id' => $request->carbrand_id,
                'name' => $request->name.'-'. rand(4,50),
                'price' => $request->price,
                'full_address' => $request->full_address,
                'short_description' => $request->short_description,
                'status' => 'INACTIVE',
                'next_of_kin_name' => $request->next_of_kin_name,
                'next_of_kin_address' => $request->next_of_kin_address,
                'next_of_kin_phone_number' => $request->next_of_kin_phone_number,
                'spouse_name' => $request->spouse_name,
                'spouse_address' => $request->spouse_address,
                'spouse_phone_number' => $request->spouse_phone_number,
                'car_plate_number' => $request->car_plate_number,
                'car_engine_number' => $request->car_engine_number,
                'license_number' => $request->license_number,
                'approved' => "NO",
            ]);

            $rideId = $ride->id;
            Session::forget('category_id');

            return view('images.newimg',compact('rideId'));


    }


        Public function admin_approve_ride($id){

        $rides = Ride::find($id);
        $advertid = Advert::where('id',$rides->advert_id)->first();

         if ($rides->approved == 'YES'){

                if ($rides->status == 'Active') {
                        
                    return redirect()->back()->with('error','Ride must be Inactive');
                
                }

            $rides->approved = 'NO';
            $rides->save();

            $advertid->level = 'LEVEL 1';
            $advertid->save();

         }else{

            $rides->approved = 'YES';
            $rides->save();

            $advertid->level = 'LEVEL 2';
            $advertid->save();
         }

        return redirect()->back()->with('success','Updated Succesfully');

    }

    Public function admin_status_ride($id){

         $rides = Ride::find($id);
         $advertid = Advert::where('id',$rides->advert_id)->first();

         if ($rides->approved == 'NO') {
                        
                return redirect()->back()->with('error','Ride must be Approved');
            
            }

         if ($rides->status == 'Active'){

            $rides->status = 'Inactive';
            $rides->save();

            $advertid->level = 'LEVEL 2';
            $advertid->save();

         }else{

            $rides->status = 'Active';
            $rides->save();

            $advertid->level = 'LEVEL 3';
            $advertid->save();
         }

         

        return redirect()->back()->with('success','Updated Succesfully');

    }

    Public function admin_ride_show($id){

        return $id;

        $ride = Ride::find($id);
        $vendor = User::where('id',$ride->user_id)->first();
        $company = Company::where('id',$ride->company_id)->first();
        $categories = Category::all();

        return view('ride.adminshow',compact('ride','vendor','company','categories'));
    }
}
