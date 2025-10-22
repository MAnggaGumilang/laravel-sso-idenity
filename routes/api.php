<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/token/check', function (Request $request) {
    return response()->json([
        'message' => 'Token is valid',
        'user'    => $request->user(),
    ]);
})->middleware('auth:api');  // penting: guard Passport