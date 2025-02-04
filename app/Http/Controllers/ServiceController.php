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
                    'advertfee_id' => 1,
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
            Session::forget('category_id');

            return view('images.newimg',compact('serviceId'));


    }

    public function admin_store(Request $request){

       

         $rules = array(
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'short_description' => 'required|string',
            'servicetype_id' => 'required|integer',
    );

          //return $request->all();
         $userid = $request->userId;
            $user = User::find($userid);

                if (!$user || !$user->company) {
                   
                    return response()->json(['success' => false, 'message' => 'User does not belong to any company.'], 400);
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
            $service = Service::create([
                'user_id' => $userid,
                'company_id' => $companyId,
                'sevicetype_id' => $request->servicetype_id,
                'advert_id' => $advert->id,
                'name' => $request->name.'-'. rand(4,50),
                'price' => $request->price,
                'description' => $request->description,
                'short_description' => $request->short_description,
                'status' => 'INACTIVE',
            ]);

            $productId = $service->id;
            $itemId = 2;
            Session::forget('category_id');

            return view('vendors.imageupload1',compact('productId','user','itemId'));


    }

    public function admin_service_show($id){

        //return $id;

        $service = Service::find($id);
        $vendor = User::where('id',$service->user_id)->first();
        $company = Company::where('id',$service->company_id)->first();
        $categories = Category::all();

        return view('service.adminshow',compact('service','vendor','company','categories'));
    }

        Public function admin_approve_service($id){

        $services = Service::find($id);
        $advertid = Advert::where('id',$services->advert_id)->first();

         if ($services->approved == 'YES'){

                if ($services->status == 'Active') {
                        
                    return redirect()->back()->with('error','Service must be Inactive');
                
                }

            $services->approved = 'NO';
            $services->save();

            $advertid->level = 'LEVEL 1';
            $advertid->save();

         }else{

            
            $services->approved = 'YES';
            $services->save();

            $advertid->level = 'LEVEL 2';
            $advertid->save();
         }

        return redirect()->back()->with('success','Updated Succesfully');

    }

    Public function admin_status_service($id){

         $services = Service::find($id);
         $advertid = Advert::where('id',$services->advert_id)->first();


         if ($services->approved == 'NO') {
                        
                return redirect()->back()->with('error','Service must be Approved');
            
            }

         if ($services->status == 'Active'){

            $services->status = 'Inactive';
            $services->save();

            $advertid->level = 'LEVEL 2';
            $advertid->save();


         }else{

            $services->status = 'Active';
            $services->save();

            $advertid->level = 'LEVEL 3';
            $advertid->save();
         }

         

        return redirect()->back()->with('success','Updated Succesfully');

    }
}
