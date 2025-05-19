<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/geocode', function (Request $request) {
    $address = $request->query('address');

    if (!$address) {
        return response()->json(['error' => 'Address is required'], 400);
    }

    $apiKey = env('GOOGLE_MAPS_API_KEY'); // simpan API key di file .env
    $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
        'address' => $address,
        'key' => $apiKey,
    ]);

    return $response->json();
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
