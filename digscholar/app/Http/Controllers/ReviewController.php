<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'user_name' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable',
        ]);

        Review::create([
            'product_id' => $productId,
            'user_name' => $request->user_name,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Review submitted!');
    }
}