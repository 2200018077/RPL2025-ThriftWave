<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::with('category')->get();
    return view('welcome', compact('products'));
});

