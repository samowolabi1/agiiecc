<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\Session;

class ImageController extends Controller
{
    //

        public function uploadImages(Request $request)
            {
                // Validate the uploaded files
                $request->validate([
                    'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
                ]);

                DB::beginTransaction(); // Start transaction

                try {

                    if ($request->hasFile('images')) {
                        foreach ($request->file('images') as $image) {
                            // Generate a unique name for the image
                            $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                            // Store the image in the folder
                           $path = $image->storeAs('uploads/images', $newName, 'public');

                            // Check if the file was successfully stored
                            if (!$path) {
                                throw new \Exception("Failed to store the image.");
                            }

                            // Save image details in the database
                            Image::create([
                                'user_id' => Auth::id(),
                                'company_id' => Auth::user()->company->id ?? null, // Nullable company ID
                                'category_id' => Auth::user()->product->category->id ?? null, // Nullable company ID
                                'product_id' => null, // Set product_id based on your logic
                                'image_name' => $image->getClientOriginalName(), // Original file name
                                'new_name' => $newName, // New file name
                                'status' => 'Inactive', // Example status
                                'approved' => 'No', // Example approval status
                                'edited' => 'No', // Example edited status
                                'extension' => $image->getClientOriginalExtension(), // File extension
                                'created_by' => Auth::user()->name ?? 'System', // User who uploaded
                                'description' => 'Uploaded via multi-upload form', // Example description
                            ]);
                        }
                    }

                    DB::commit(); // Commit transaction if everything is successful

                
                    return redirect()->route('my.adverts')->with('success','Successfully Created!');
                
                } catch (\Exception $e) {
                    DB::rollBack(); // Rollback transaction on error

                    // Log the error for debugging
                    \Log::error('Image upload error: ' . $e->getMessage());

                    // Return an error message
                    return back()->with('error', 'An error occurred while uploading images. Please try again.');
                }
            }

                //return redirect()->route('my.adverts')->with('success','Successfully Created!');

        public function admin_uploadImages(Request $request)
            {
                //return $request->all();
                // Validate the uploaded files
                $request->validate([
                    'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate each image
                ]);

                $userid = $request->userId;
                $productid = $request->productId;
                $categoryid = $request->itemId;
                $user = User::find($userid);

                if (!$user || !$user->company) {
                   
                    return response()->json(['success' => false, 'message' => 'User does not belong to any company.'], 400);
                }

                $companyId = $user->company->id;

                DB::beginTransaction(); // Start transaction

                try {

                    if ($request->hasFile('images')) {
                        foreach ($request->file('images') as $image) {
                            // Generate a unique name for the image
                            $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                            // Store the image in the folder
                           $path = $image->storeAs('uploads/images', $newName, 'public');

                            // Check if the file was successfully stored
                            if (!$path) {
                                throw new \Exception("Failed to store the image.");
                            }

                            // Save image details in the database
                            Image::create([
                                'user_id' => $userid,
                                'company_id' => $companyId, // Nullable company ID
                                'category_id' => $categoryid ?? null, // Nullable company ID
                                'product_id' => $productid, // Set product_id based on your logic
                                'image_name' => $image->getClientOriginalName(), // Original file name
                                'new_name' => $newName, // New file name
                                'status' => 'Inactive', // Example status
                                'approved' => 'No', // Example approval status
                                'edited' => 'No', // Example edited status
                                'extension' => $image->getClientOriginalExtension(), // File extension
                                'created_by' => $user->name ?? 'System', // User who uploaded
                                'description' => 'Uploaded via multi-upload form', // Example description
                            ]);
                        }
                    }

                    DB::commit(); // Commit transaction if everything is successful

                    //return "Successfull";
                
                    return redirect()->route('vendor.items',$userid)->with('success','Successfully Created!');
                
                } catch (\Exception $e) {
                    DB::rollBack(); // Rollback transaction on error

                    // Log the error for debugging
                    \Log::error('Image upload error: ' . $e->getMessage());

                    // Return an error message
                    return back()->with('error', 'An error occurred while uploading images. Please try again.');
                }
            }



}
