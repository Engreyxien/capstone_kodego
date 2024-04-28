<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    public function getBookings(Request $request)
    {
        $userBookings = auth()->user()->bookings;
        return BookingResource::collection($userBookings);
    }

   public function getBookingsbyUser($id)
   {
       $booking = auth()->user()->booking->find($id);
       return new BookingResource($booking);
   }

    public function setBookings(Request $request)
    {
        $fields = $request->validate([
            "check_in" => "required",
            "check_out" => "required",
            "number_of_guests" => "required",
            "tour_name" => "required",
            "destination_name" => "required",
            "accommodation_name" => "required",
            "user_id" => "required"
        ]);

        $booking = Booking::create([
            "check_in" => $fields["check_in"],
            "check_out" => $fields["check_out"],
            "number_of_guests" => $fields["number_of_guests"],
            "tour_id" => $fields["tour_name"],
            "destination_id" => $fields["destination_name"],
            "accommodation_id" => $fields["accommodation_name"],
            "user_id" => $fields["user_id"]
        ]);

        return response()->json([
            "message" => "Booking has been added successfully",
            "data" => new BookingResource($booking)
        ], 201, [], JSON_PRETTY_PRINT);
    }

    public function updateBooking(Request $request, $id)
    {
        $booking = Booking::where("id", $id)->where("user_id", auth()->user()->id)->first();

        if (!$booking) {
            return response()->json([
                "message" => "Booking does not exist"
            ], 404, [], JSON_PRETTY_PRINT);
        }

        $fields = $request->validate([
            "check_in" => "required",
            "check_out" => "required",
            "number_of_guests" => "required",
            "tour_id" => "required",
            "destination_id" => "required",
            "accommodation_id" => "required",
            "user_id" => "required"
        ]);

        $booking->check_in = $fields["check_in"];
        $booking->check_out = $fields["check_out"];
        $booking->number_of_guests = $fields["number_of_guests"];
        $booking->tour_id = $fields["tour_id"];
        $booking->destination_id = $fields["destination_id"];
        $booking->accommodation_id = $fields["accommodation_id"];
        $booking->user_id = $fields["user_id"];
        $booking->save();

        return response()->json([
            "message" => "Booking has been updated successfully",
            "data" => new BookingResource($booking)
        ], 200, [], JSON_PRETTY_PRINT);
    }
}