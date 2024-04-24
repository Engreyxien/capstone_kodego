<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Http\Resources\DestinationResource;

class DestinationController extends Controller
{
    function getDestinations(Request $request) {$destinations = Destination::where("user_id", auth()->user()->id)->get();
        return response()->json($destinations, 200, [], JSON_PRETTY_PRINT);
    }
    function getDestination($id){
        $destination = Destination::where("id", $id)->where("user_id", auth()->id())->first();
        return response()->json($destination, 200, [], JSON_PRETTY_PRINT);
    }
    
    function setDestination(Request $request) {
        $fields = $request->validate([
            "destination_name" => "required",
            "destination_description" => "required",
            "destination_image" => "nullable|image",
            "tour_id" => "required",
            "user_id" => "required"
        ]);
    
        $destination = Destination::create([
            "destination_name" => $fields["destination_name"],
            "destination_description" => $fields["destination_description"],
            "destination_image" => $fields["destination_image"],
            "tour_id" => $fields["tour_id"],
            "user_id" => auth()->id()
        ]);
    
        return response()->json([
            "message" => "Destination has been added successfully",
            "data" => $destination
        ], 201, [], JSON_PRETTY_PRINT);
    }
    
    function updateDestination(Request $request, $id) {
        $destination = Destination::where("id", $id)->where("user_id", auth()->id())->first();
    
        if (!$destination) {
            return response()->json([
                "message" => "Destination does not exist"
            ], 404, [], JSON_PRETTY_PRINT);
        }
    
        $fields = $request->validate([
            "destination_name" => "required",
            "destination_description" => "required",
            "destination_image" => "nullable|image",
            "tour_id" => "required",
            "user_id" => "required"
        ]);
    
        $destination->name = $fields["destination_name"];
        $destination->description = $fields["destination_description"];
        $destination->image = $fields["destination_image"];
        $destination->tour_id = $fields["tour_id"];
        $destination->user_id = auth()->id();
        $destination->save();
    
        return response()->json([
            "message" => "Destination has been updated successfully",
            "data" => $destination
        ], 200, [], JSON_PRETTY_PRINT);
    }
    
    function deleteTask($id) {
        $destination = Destination::where("id", $id)->where("user_id", auth()->id())->first();
    
        if (!$destination) {
            return response()->json([
                "message" => "Destination does not exist"
            ], 404, [], JSON_PRETTY_PRINT);
        }
    
        $destination->delete();
        return response()->json([
            "message" => "Destination has been deleted successfully"
        ], 200, [], JSON_PRETTY_PRINT);
    }
}


