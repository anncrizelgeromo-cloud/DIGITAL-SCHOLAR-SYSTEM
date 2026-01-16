<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show single product with reviews
    public function show($id)
    {
        $product = Product::with('reviews')->findOrFail($id);
        return view('products.show', compact('product'));
    }
}