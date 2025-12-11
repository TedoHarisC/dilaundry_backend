<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    function index()
    {
        $shops  = Shop::all();
        return response()->json([
            'status' => 'success',
            'data' => $shops
        ], 200);
    }

    function recommendation()
    {
        $shops  = Shop::orderBy('rating', 'desc')
            ->limit(5)
            ->get();

        if (count($shops) == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'No shops found'
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $shops
            ], 200);
        }
    }

    function searchByCity($city)
    {
        $shops  = Shop::where('city', 'like', '%' . $city . '%')
            ->orderBy('name')
            ->get();

        if (count($shops) == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'No shops found in the specified city'
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $shops
            ], 200);
        }
    }
}
