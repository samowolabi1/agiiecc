<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomRegisterController extends Controller
{
    public function registeruser(){
        return view('frontend.signup');
    }


    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Auto-login after registration

        return redirect()->route('home.index')->with('success', 'Account created successfully!');
    }


    public function update_profile(Request $request){
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'houseNo' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'stateOfOrigin' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'phoneNumber' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'dob' => 'required|date',
            'sex' => 'required|in:Male,Female',
            'country' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Check if the user exists
        $user = auth()->user(); // Get the authenticated user

        if ($user) {
            // Update user details
            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'houseNo' => $request->houseNo,
                'address1' => $request->address1,
                'stateOfOrigin' => $request->stateOfOrigin,
                'postcode' => $request->postcode,
                'phoneNumber' => $request->phoneNumber,
                'email' => $request->email,
                'dob' => $request->dob,
                'sex' => $request->sex,
                'department_id' => 3,
                'country' => $request->country,
            ]);

            // Handle profile picture upload if provided
            if ($request->hasFile('profile_picture')) {
                $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
                $user->update(['profile_picture' => $imagePath]);
            }

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }

}
