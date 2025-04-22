<?php

use App\Http\Controllers\Api\CustomerApiController;
use App\Http\Controllers\Api\InvoiceApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return response()->json(['message' => 'Welcome to the API!']);
});

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
    Route::prefix('/customer')->as('customer.')->group(function() {
        Route::post('/create', [CustomerApiController::class, 'store'])->name('store');
    });

    Route::prefix('/invoice')->as('invoice.')->group(function() {
        Route::post('/create', [InvoiceApiController::class, 'store'])->name('store');
    });
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');