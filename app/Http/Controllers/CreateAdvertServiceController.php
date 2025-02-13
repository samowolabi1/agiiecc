<?php

namespace App\Http\Controllers;

use App\Models\RideServiceImage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Advert;
use App\Models\Category;
use App\Models\Company;
use App\Models\Service;
use Illuminate\Support\Facades\Session;

use App\Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

use Auth;


class CreateAdvertServiceController extends Controller
{
    public function vendor_create_service(Request $request)
    {



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

        // Create a service
        $service = Service::create([
            'user_id' => $userid,
            'company_id' => $companyId,
            'sevicetype_id' => $request->servicetype_id,
            'advert_id' => $advert->id,
            'name' => $request->name . '-' . rand(4, 50),
            'price' => $request->price,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'status' => 'INACTIVE',
        ]);

        $productId = $service->id;
        $itemId = 2;
        Session::forget('category_id');

        //    return view('adverts.vendoradvertuploadimage',compact('productId','user','itemId'));

        return redirect()->route('vendoradvertuploadimage', [
            'productId' => $service->id,
            'user' => $user->id,
            'itemId' => $itemId,
            'service' => 'uploadingService'
        ]);
    }

    public function ride_uploadImages(Request $request)
    {
        // Validate the uploaded files
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
        ]);

        $userId = $request->userId;
        $rideId = $request->rideId;
        $serviceId = $request->serviceId;

        $user = User::find($userId);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found.'], 400);
        }

        DB::beginTransaction(); // Start transaction

        try {
            $storedImages = [];

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    // Generate a unique name for the image
                    $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                    // Store the image in the folder
                    $path = $image->storeAs('uploads/ride_images', $newName, 'public');

                    // Check if the file was successfully stored
                    if (!$path) {
                        throw new \Exception("Failed to store the image.");
                    }

                    // Store image details in an array
                    $storedImages[] = [
                        'original_name' => $image->getClientOriginalName(),
                        'new_name' => $newName,
                        'extension' => $image->getClientOriginalExtension(),
                        'path' => $path
                    ];
                }

                // Save image details in the database
                RideServiceImage::create([
                    'user_id' => $userId,
                    'ride_id' => $rideId ?? null,
                    'service_id' => $serviceId ?? null,
                    'image_name' => json_encode($storedImages), // Store as JSON
                ]);
            }

            DB::commit(); // Commit transaction if everything is successful

            // return redirect()->route('view_ride_images', $userId)->with('success', 'Successfully Uploaded!');


            return redirect()->route('view_product_ads', $userId)->with('success', 'Successfully Created!');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error

            \Log::error('Ride image upload error: ' . $e->getMessage());

            // dd($e->getMessage());

            return back()->with('error', 'An error occurred while uploading images. Please try again.');
        }
    }


}
