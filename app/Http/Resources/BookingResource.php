<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'tour_name' => $this->tour_name,
            'accommodation_type' => $this->accommodation_type,
            'destination_name' => $this->destination_name,
            'user_id' => $this->user_id
        ];
    }
}
