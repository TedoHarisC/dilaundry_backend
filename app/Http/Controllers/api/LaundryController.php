<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    function index()
    {
        $laundries  = Laundry::with('user', 'shop')->get();
        return response()->json([
            'status' => 'success',
            'data' => $laundries
        ], 200);
    }
}
