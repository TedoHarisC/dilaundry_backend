<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    function index()
    {
        $promos  = Promo::with('shop')->get();
        return response()->json([
            'status' => 'success',
            'data' => $promos
        ], 200);
    }
}
