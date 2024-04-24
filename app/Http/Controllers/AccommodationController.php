<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accommodation;
use App\Http\Resources\AccommodationResource;

class AccommodationController extends Controller
{
    function getAccommodations(Request $request) 
    {
        $userAccommodations = Accommodation::where("user_id", auth()->user()->id)->get();
        $allAccommodations = Accommodation::whereNotIn('id', $userAccommodations->pluck('id'))->get();
        
        $combinedAccommodations = $userAccommodations->merge($allAccommodations);
        
        return response()->json($combinedAccommodations, 200, [], JSON_PRETTY_PRINT);
    }
    function getAccommodation($id){
        $accommodation = Accommodation("id", $id)->first();
        return response()->json($accommodation, 200, [], JSON_PRETTY_PRINT);
    }

    function setAccommodation(Request $request) {
        $fields =$request->validate([
            "accommodation_name" => "required",
            "accommodation_description" => "required",
            "accommodation-type" => "required",
            "accommodation_address" => "required",
            "accommodation_price" => "required",
            "accommodation_image" => "nullable|image",
            "contact_info" => "required",
            "destination_id" => "required",
            "citymun_id" => "required",
            "user_id" => "required"
        ]);

        $accommodation = Accommodation::create([
            "accommodation_name" => $fields["accommodation_name"],
            "accommodation_description" => $fields["accommodation_description"],
            "accommodation_type" => $fields["accommodation_type"],
            "accommodation_address" => $fields["accommodation_address"],
            "accommodation_price" => $fields["accommodation_price"],
            "accommodation_image" => $fields["accommodation_image"],
            "contact_info" => $fields["contact_info"],
            "destination_id" => $fields["destination_id"],
            "citymun_id" => $fields["citymun_id"],
            "user_id" => $fields["user_id"]
        ]);

        return response()->json([
            "message" => "Accommodation has been added successfully",
            "data" => $accommodation
        ], 201, [], JSON_PRETTY_PRINT);
    }
    function updateAccommodation(Request $request, $id) {
        $accommodation = Accommodation::where("id", $id)->first();

        if (!$accommodation) {
            return response()->json([
                "message" => "Accommodation does not exist"
            ], 404, [], JSON_PRETTY_PRINT);
        }

        $fields = $request->validate([
            "accommodation_name" => "required",
            "accommodation_description" => "required",
            "accommodation-type" => "required",
            "accommodation_address" => "required",
            "accommodation_price" => "required",
            "accommodation_image" => "nullable|image",
            "contact_info" => "required",
            "destination_id" => "required",
            "citymun_id" => "required",
            "user_id" => "required"
        ]);

        $accommodation->name = $fields["accommodation_name"];
        $accommodation->description = $fields["accommodation_description"];
        $accommodation->type = $fields["accommodation_type"];
        $accommodation->address = $fields["accommodation_address"];
        $accommodation->price = $fields["accommodation_price"];
        $accommodation->image = $fields["accommodation_image"];
        $accommodation->contact_info = $fields["contact_info"];
        $accommodation->destination_id = $fields["destination_id"];
        $accommodation->citymun_id = $fields["citymun_id"];
        $accommodation->user_id = $fields["user_id"];
        $accommodation->save();

        return response()->json([
            "message" => "Accommodation has been updated successfully",
            "data" => $accommodation
        ], 200, [], JSON_PRETTY_PRINT);
    }

    function deleteAccommodation($id) {
        $accommodation = Accommodation::where("id", $id)->first();

        if (!$accommodation) {
            return response()->json([
                "message" => "Accommodation does not exist"
            ], 404, [], JSON_PRETTY_PRINT);
        }

        $accommodation->delete();
        return response()->json([
            "message" => "Accommodation has been deleted successfully"
        ], 200, [], JSON_PRETTY_PRINT);
    }
} 


