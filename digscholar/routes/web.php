<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

// Home page → list ng products
Route::get('/', [ProductController::class, 'index']);

// Product details page
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

// Submit review form
Route::post('products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');