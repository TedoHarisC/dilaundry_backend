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

    function getByUser($userId)
    {
        $laundries  = Laundry::where('user_id', $userId)
            ->with('shop', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($laundries) == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'No laundries found for the specified user'
            ], 404);
        } else {
            return response()->json([
                'status' => 'success',
                'data' => $laundries
            ], 200);
        }
    }

    function claim(Request $request)
    {
        // Validate input
        $laundry = Laundry::where([
            'id' => $request->laundry_id,
            'claim_code' => $request->claim_code
        ])->first();

        // Check if laundry exists
        if (!$laundry) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid laundry ID or claim code'
            ], 404);
        }

        // Check if laundry is already claimed
        if ($laundry->user_id != 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Laundry already claimed'
            ], 400);
        }

        // Claim the laundry
        $laundry->user_id = $request->user_id;
        $updated = $laundry->save();

        if ($updated) {
            return response()->json([
                'status' => 'success',
                'message' => 'Laundry claimed successfully',
                'data' => $laundry
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to claim laundry'
            ], 500);
        }
    }
}
