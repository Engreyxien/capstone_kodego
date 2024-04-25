<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Resources\BookingResource;

class BookingController extends Controller
{
    public function getBookings(Request $request) {
        $userBookings = auth()->user()->bookings;
        return response()->json($userBookings);
    }

    public function getBooking($id) {
        $booking = auth()->user()->bookings->find($id);
        return response()->json($booking);
    }

    public function setBooking(Request $request) {
        $fields = $request->validate([
            "check_in" => "required",
            "check_out" => "required",
            "number_of_guests" => "required",
            "destination_id" => "required",
            "accommodation_id" => "required",
            "user_id" => "required"
        ]);
    }

    public function updateBooking(Request $request, $id) {
        
        $booking = Booking::where("id", $id)->first();

        if (!$booking) {
            return response()->json([
                "message" => "Booking does not exist"
            ], 404);
        }

        $fields = $request->validate([
            "check_in" => "required",
            "check_out" => "required",
            "number_of_guests" => "required",
            "destination_id" => "required",
            "accommodation_id" => "required",
            "user_id" => "required"
        ]);

        $booking->check_in = $fields["check_in"];
        $booking->check_out = $fields["check_out"];
        $booking->number_of_guests = $fields["number_of_guests"];
        $booking->destination_id = $fields["destination_id"];
        $booking->accommodation_id = $fields["accommodation_id"];
        $booking->user_id = $fields["user_id"];

        $booking->save();

        return response()->json([
            "message" => "Booking has been updated successfully",
        ]);
    }

}
