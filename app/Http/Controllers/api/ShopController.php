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
}
