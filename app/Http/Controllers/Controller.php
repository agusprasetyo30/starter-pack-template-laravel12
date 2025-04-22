<?php

namespace App\Http\Controllers;

use App\Traits\MainResponseTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller
{
    use AuthorizesRequests, ValidatesRequests, MainResponseTrait;
}
