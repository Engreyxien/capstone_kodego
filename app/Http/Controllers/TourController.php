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

    public function show(Tour $tour)
    {
        return response()->json($tour);
    }

    public function update(Request $request, Tour $tour)
    {
        $fields = $request->validate([
            "tour_title" => "required",
            "tour_description" => "required",
            "tour_price" => "required",
            "tour_duration" => "required",
            "country_id" => "required",
            "user_id" => "required",
        ]);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            "tour_title" => "required",
            "tour_description" => "required",
            "tour_price" => "required",
            "tour_duration" => "required",
            "country_id" => "required",
            "user_id" => "required",
        ]);
    }
}
