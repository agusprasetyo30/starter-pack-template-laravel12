<?php

use App\Http\Controllers\Master\CustomerController;
use App\Http\Controllers\Master\SalesmanController;
use App\Http\Controllers\Transaction\CreditNoteController;
use App\Http\Controllers\Transaction\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
});

// Dashboard
Route::get('/', function() {
    return view('dashboard.index');
})->name('dashboard');

Route::prefix('/master')->as('master.')->group(function() {
    Route::resource('customer', CustomerController::class)->only(['index', 'store', 'update']);
    Route::resource('salesman', SalesmanController::class)->only(['index', 'store', 'update']);
});

Route::prefix('/transaction')->as('transaction.')->group(function() {
    Route::resource('invoice', InvoiceController::class)->only(['index']);
    Route::resource('credit-note', CreditNoteController::class)->only(['index']);
});

