<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\Destination;
use App\Models\User;
use App\Models\Tour;
use App\Http\Resources\AccommodationResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'number_of_guests' => $this->number_of_guests,
            'tour_id' => $this->tour->name,
            'accommodation_id' => $this->accommodation->type,
            'destination_id' => $this->destination->name,
            'user_id' => $this->user_id
        ];
    }
}

