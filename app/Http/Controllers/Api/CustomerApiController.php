<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\Customer\StoreRequest;
use Illuminate\Support\Facades\Response;

class CustomerApiController extends Controller
{
    // Display a listing of the resource.
    public function index() {
        //
    }

    // Store a newly created resource in storage.
    public function store(StoreRequest $request) {
        // nanti ini diisi proses penyimpanan ke database

        return Response::created($request->input(), "Customer created successfully");
    }
}
