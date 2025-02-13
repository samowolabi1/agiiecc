<?php

namespace App\Http\Controllers;
use App\Models\createreview;
use Illuminate\Http\Request;
use App\Models\Product;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'integer|min:1|max:5',
            'review' => 'required|string'
        ]);

        createreview::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'name' => auth()->user()->firstname, // Use logged-in user name
            'review' => $request->review,
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('success', 'Review added successfully!');
    }
}
