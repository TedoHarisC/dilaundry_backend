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

    function readLimit()
    {
        $promos  = Promo::orderBy('created_at', 'desc')
            ->limit(5)
            ->with('shop')
            ->get();

        if (count($promos) == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'No promos found'
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $promos
            ], 200);
        }
    }
}
