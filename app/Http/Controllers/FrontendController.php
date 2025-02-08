<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        //    $products = Product::paginate(20);
        $products = Product::with('images')->paginate(20);
        return view('frontend.index', compact('products'));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function category()
    {
        return view('frontend.category');
    }

    public function ride()
    {
        return view('frontend.ride');
    }

    public function service()
    {
        return view('frontend.service');
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
