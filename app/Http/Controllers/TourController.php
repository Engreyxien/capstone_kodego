<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
    public function getTours(Request $request)
    {
        $tours = Tour::all();
        return response()->json($tours);
    }
}
