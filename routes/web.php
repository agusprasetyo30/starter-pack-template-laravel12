<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
});

Route::group(['prefix'=> 'dashboard'], function() {
    Route::get('/', function() {
        return view('dashboard.index');
    });
});