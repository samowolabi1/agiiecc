<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Advert;
use App\Models\Category;
use App\Models\Company;
use App\Models\Service;
use Illuminate\Support\Facades\Session;
use Cviebrock\EloquentSluggable\Sluggable;
use Auth;

class ServiceController extends Controller
{
    //

    public function store(Request $request){

       

         $rules = array(
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'servicetype_id' => 'required|integer',
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
            $service = Service::create([
                'user_id' => Auth::id(),
                'company_id' => $companyId,
                'sevicetype_id' => $request->servicetype_id,
                'advert_id' => $advert->id,
                'name' => $request->name.'-'. rand(4,50),
                'price' => $request->price,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'status' => 'INACTIVE',
            ]);

            $serviceId = $service->id;

            return view('images.newimg',compact('serviceId'));


    }
}
