<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use App\Models\Color;
use App\Models\Ride;
use App\Models\Size;
use App\Models\Productcolor;
use App\Models\Productsize;
use App\Models\Sevicetype;
class UpdateAdvertController extends Controller
{
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $types = Type::all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('products.edit', compact('product', 'types', 'colors', 'sizes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'ProductCategory' => 'required|exists:types,id',
            'color_id' => 'array',
            'size_id' => 'array'
        ]);

        $colorIds = $request->color_id;
        $sizeIds = $request->ProductSize;


        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'price' => $request->price,
            'type_id' => $request->ProductCategory,
            'size_id' => $sizeIds[0], // First size
            'color_id' => $colorIds[0], // First color
            'status' => 'EDITED',
            'approved' => 'NOTAPPROVED'
        ]);

        // Update Product Colors
        if (!empty($request->color_id)) {
            foreach ($request->color_id as $colorId) {
                $color = Color::findOrFail($colorId);
                $productColor = Productcolor::where('product_id', $product->id)->where('id', $colorId)->first();
                if ($productColor) {
                    $productColor->name = $color->name;
                    $productColor->save();
                }
            }
        }

        // Update Product Sizes
        if (!empty($request->ProductSize)) {
            foreach ($request->ProductSize as $sizeId) {
                $size = Size::findOrFail($sizeId);
                $productSize = Productsize::where('product_id', $product->id)->where('id', $sizeId)->first();
                if ($productSize) {
                    $productSize->name = $size->name;
                    $productSize->save();
                }
            }
        }


        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function storeOrUpdate(Request $request, $id = null)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:rides,slug,' . ($id ?? 'NULL') . ',id',
            'short_description' => 'nullable|string',
            'full_address' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'service_link' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'ridetype_id' => 'nullable|exists:ridetypes,id',
            'color_id' => 'nullable|exists:colors,id',
            'carbrand_id' => 'nullable|exists:carbrands,id',
            'cartype_id' => 'nullable|exists:cartypes,id',
            'car_plate_number' => 'nullable|string|max:50',
            'car_engine_number' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:50',
            'next_of_kin_name' => 'nullable|string|max:255',
            'next_of_kin_address' => 'nullable|string|max:255',
            'next_of_kin_phone_number' => 'nullable|string|max:50',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_address' => 'nullable|string|max:255',
            'spouse_phone_number' => 'nullable|string|max:50',
            'status' => 'required|in:active,inactive',
        ]);

        if ($id) {
            $ride = Ride::findOrFail($id);
            $ride->update($validatedData);
            return redirect()->back()->with('success', 'Product updated successfully!');
        } else {
            // Ride::create($validatedData);
            return redirect()->back()->withErrors('errors', 'Something went wrong try again');
        }
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
            'description' => 'required|string', // Allow HTML content
            'price' => 'required|numeric',
            'sevicetype_id' => 'required|exists:sevicetypes,id',
            'status' => 'required|in:active,inactive',
        ]);

        $service->update($data);

        return redirect()->back()->with('success', 'Service updated successfully!');
    }
}

