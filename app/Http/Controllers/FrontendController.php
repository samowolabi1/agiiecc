<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Service;
class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::with('images')
            ->where('status', 'active')
            ->where('approved', 'APPROVED')
            ->paginate(20);

        $type = Type::all();

        return view('frontend.index', compact('products', 'type'));
    }


    public function about()
    {
        return view('frontend.about');
    }


    public function category(Request $request)
    {
        $query = Product::with('images')
            ->where('status', 'active')
            ->where('approved', 'APPROVED');

        // Filter by category
        if ($request->has('category')) {
            $query->whereIn('type_id', $request->category);
        }

        // Filter by price range (ensure using 'pr' column)
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $products = $query->paginate(20);
        $type = Type::all();

        return view('frontend.category', compact('products', 'type'));
    }




    public function ride()
    {
        return view('frontend.ride');
    }

    // public function service(Request $request)
    // {
    //     $query = Service::where('status', 'active')
    //         ->where('approved', 'APPROVED');

    //     if ($request->has('service_type') && !empty($request->service_type)) {
    //         $query->where('name', 'like', '%' . $request->service_type . '%');
    //     }

    //     $services = $query->get();

    //     return view('frontend.service', compact('services'));
    // }

    // public function service(Request $request)
    // {
    //     // Get all active and approved services
    //     $services = Service::where('status', 'active')
    //         ->where('approved', 'APPROVED')
    //         ->get();

    //     $filteredServices = collect(); // Default empty collection

    //     // If a search term is provided, filter the results
    //     if ($request->has('service_type') && !empty($request->service_type)) {
    //         $filteredServices = Service::where('status', 'ACTIVE')
    //             ->where('approved', 'APPROVED')
    //             ->where('name', 'LIKE', '%' . $request->service_type . '%')
    //             ->get();
    //     }

    //     return view('frontend.service', compact('services', 'filteredServices'));
    // }


    public function service(Request $request)
    {
        // Get all active and approved services
        $services = Service::where('status', 'active')
            ->where('approved', 'APPROVED')
            ->get();

        $filteredServices = collect(); // Default empty collection

        // If a search term is provided, filter the results
        if ($request->has('service_type') && !empty($request->service_type)) {
            $searchTerm = $request->service_type;

            $filteredServices = Service::where('status', 'active')
                ->where('approved', 'APPROVED')
                ->where(function ($query) use ($searchTerm) {
                    $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                          ->orWhere('short_description', 'LIKE', '%' . $searchTerm . '%');
                })
                ->get();
        }

        return view('frontend.service', compact('services', 'filteredServices'));
    }


    public function contact()
    {
        return view('frontend.contact');
    }

    public function product(Product $product)
    {


        $product->load(['company', 'images']);
        $relatedProducts = Product::inRandomOrder()
            ->where('id', '!=', $product->id)  // Exclude the current product
            ->take(4)
            ->get();
        return view('frontend.product', compact('product', 'relatedProducts'));
    }


}
