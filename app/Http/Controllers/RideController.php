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

            return view('images.newimg',compact('rideId'));


    }
}
