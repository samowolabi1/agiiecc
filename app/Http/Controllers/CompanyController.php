<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company;
use Auth;
use App\Models\User;
class CompanyController extends Controller
{
    //




        public function store(Request $request){

           // return $request->all();

              $this->validate($request, [

                    'name' => 'required',
                    'short_description' => 'required',
                    'phone_number' => 'required',
                    'state_id' => 'required',
                    'address' => 'required',
                    'brand_name' => 'required'

                ]);

        //return $request->all();
             $company = new Company();
             $company->name = $request->input('name');
             $company->user_id = Auth::id();
             $company->short_description = $request->input('short_description');
             $company->phone_number = $request->input('phone_number');
             $company->address = $request->input('address');
             $company->state_id = $request->input('state_id');
             $company->brand_name = $request->input('brand_name');
             $company->website = $request->input('website');
             $company->description = $request->input('short_description');
             $company->facebook = $request->input('facebook');
             $company->whatsapp = $request->input('whatsapp');
             $company->twitter = $request->input('twitter');
             $company->twitter = $request->input('instagram');
             $company->save();



            return redirect()->back()->with('success','Company Created Succesfully');

    }

    public function vencomp(Request $request){

            //return $request->all();

              $this->validate($request, [

                    'name' => 'required',
                    'short_description' => 'required',
                    'phone_number' => 'required',
                    'state_id' => 'required',
                    'address' => 'required',
                    'brand_name' => 'required'

                ]);

              $employee = User::find($request->maketer_id);

        //return $request->all();
             $company = new Company();
             $company->name = $request->input('name');
             $company->user_id = $request->userId;
             $company->created_by = $employee->firstname.' '.$employee->lastname;
             $company->short_description = $request->input('short_description');
             $company->phone_number = $request->input('phone_number');
             $company->address = $request->input('address');
             $company->state_id = $request->input('state_id');
             $company->brand_name = $request->input('brand_name');
             $company->website = $request->input('website');
             $company->description = $request->input('short_description');
             $company->facebook = $request->input('facebook');
             $company->whatsapp = $request->input('whatsapp');
             $company->twitter = $request->input('twitter');
             $company->twitter = $request->input('instagram');
             $company->save();



            return redirect()->back()->with('success','Company Created Succesfully');

    }

    public function update(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'name' => 'required',
            'short_description' => 'required',
            'phone_number' => 'required',
            'state_id' => 'required',
            'address' => 'required',
            'brand_name' => 'required',
        ]);

        // Get the authenticated user's company
        $company = Company::where('user_id', Auth::id())->first();

        if (!$company) {
            return redirect()->back()->with('error', 'Company not found.');
        }

        // Update the company
        $company->name = $request->input('name');
        $company->short_description = $request->input('short_description');
        $company->phone_number = $request->input('phone_number');
        $company->address = $request->input('address');
        $company->state_id = $request->input('state_id');
        $company->brand_name = $request->input('brand_name');
        $company->website = $request->input('website');
        $company->description = $request->input('short_description');
        $company->facebook = $request->input('facebook');
        $company->whatsapp = $request->input('whatsapp');
        $company->twitter = $request->input('twitter');
        $company->instagram = $request->input('instagram'); // ✅ Correct field

        $company->save(); // ✅ Save the existing record

        return redirect()->back()->with('success', 'Company updated successfully.');
    }




}


