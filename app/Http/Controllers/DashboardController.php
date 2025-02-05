<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function updateProfilePicture(Request $request)
    {

        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->move(public_path('profile_pictures'), $filename);

            // Delete the old picture if it exists
            if ($user->profile_picture && file_exists(public_path('profile_pictures/' . $user->profile_picture))) {
                unlink(public_path('profile_pictures/' . $user->profile_picture));
            }

            $user->profile_picture = $filename;
            $user->save();
        }

        return back()->with('success', 'Profile picture updated successfully.');
    }


    public function additional_info(Request $request)
    {
        $request->validate([
            'firstname' => 'required|regex:/^[a-zA-Z]+$/',
            'lastname' => 'required|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email',
            'old_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
        ]);

        $user = auth()->user();

        // Verify old password
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }

        // Update user info
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

}
