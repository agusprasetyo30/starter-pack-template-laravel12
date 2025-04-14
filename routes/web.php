<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'dashboard'], function() {
    Route::get('/', function() {
        return view('dashboard.index');
    });
});