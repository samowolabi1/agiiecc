<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Models\State;
use App\Models\Company;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Ride;
use App\Models\Service;
use App\Models\Product;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Category;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function userProfile(){

        $states = State::all();
        $company = User::find(Auth::id())->company;


        //return $company;

        return view('profile.userprofile', compact('states','company'));
    }
// starts

    public function empindex(){

        $users = User::where('department_id',2)->get();


        return view('employees.index',compact('users'));
    }

    public function venindex(){

        $users = User::where('department_id',3)->get();


        return view('vendors.index',compact('users'));
    }

    public function product_index(){

        $products = Product::all();


        return view('items.prodindex',compact('products'));
    }

    public function service_index(){


        $services = Service::all();


        return view('items.serviceindex',compact('services'));
    }

    public function ride_index(){

        $rides = Ride::all();


        return view('items.rideindex',compact('rides'));
    }



    public function venview($id){

        $user = User::find($id);
        $states = State::all();
        $employees = User::where('department_id',2)->get();
        $company = User::find($id)->company;
        $categories = Category::all();


        return view('vendors.show',compact('user','company','states','id','employees','categories'));
    }

     public function cusview($id){

        $user = User::find($id);


        return view('customer.show',compact('user'));
    }

     public function empview($id){

        $user = User::find($id);
        $depts = Department::all();



        return view('employees.show',compact('user','depts'));
    }

    public function cusindex(){

        $users = User::where('department_id',5)->get();


        return view('customer.index',compact('users'));
    }

    public function empstore(Request $request){

          $rules = array(
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'sex' => 'required',
            'email' => 'required|string',
            'password' => 'required|string'
            );

            $validator = Validator::make($request->all(), $rules);


                if ($validator->fails()) {

                    return response([
                        'error_msg' => $validator->errors()
                    ], 400);

                }else{

                    $user = User::create([
                    'department_id' => 2,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'sex' => $request->sex,
                    'email' => $request->email,
                    'email_verified_at' => now(),
                    'password' => bcrypt($request->password),
                ]);

                    $user->assignRole('employee');
                    $user->createToken('myapptoken')->plainTextToken;

                }

                return redirect()->back()->with('success','Employee Created Succesfully');

    }

    public function venstore(Request $request){

          $rules = array(
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'sex' => 'required',
            'email' => 'required|string',
            'password' => 'required|string'
            );

            $validator = Validator::make($request->all(), $rules);


                if ($validator->fails()) {

                    return response([
                        'error_msg' => $validator->errors()
                    ], 400);

                }else{

                    $user = User::create([
                    'department_id' => 3,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'sex' => $request->sex,
                    'email' => $request->email,
                    'email_verified_at' => now(),
                    'password' => bcrypt($request->password),
                ]);

                    $user->assignRole('vendor');
                    $user->createToken('myapptoken')->plainTextToken;

                }

                return redirect()->back()->with('success','Vendor Created Succesfully');

    }


    public function cusstore(Request $request){

          $rules = array(
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'sex' => 'required',
            'email' => 'required|string',
            'password' => 'required|string'
            );

            $validator = Validator::make($request->all(), $rules);


                if ($validator->fails()) {

                    return response([
                        'error_msg' => $validator->errors()
                    ], 400);

                }else{

                    $user = User::create([
                    'department_id' => 5,
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'sex' => $request->sex,
                    'email' => $request->email,
                    'email_verified_at' => now(),
                    'password' => bcrypt($request->password),
                ]);

                    $user->assignRole('customer');
                    $user->createToken('myapptoken')->plainTextToken;

                }

                return redirect()->back()->with('success','Customer Created Succesfully');

    }




    // ends


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }



    // update vendor profile

    public function updateProfile(){

        $company = User::find(Auth::id())->company;
        $states = State::all();
        return view('profile.updateprofile', compact('company', 'states'));

    }
}
