<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccommodationResource extends JsonResource
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
            'accommodation_name' => $this->accommodation_name,
            'accommodation_description' => $this->accommodation_description,
            'accommodation_type' => $this->accommodation_type,
            'accommodation_address' => $this->accommodation_address,
            'accommodation_price' => $this->accommodation_price,
            'accommodation_image' => $this->accommodation_image,
            'contact-info' => $this->contact_info,
            'destination_id' => $this->destination_id,
            'citymun_id' => $this->citymun_id,
            'user_id' => $this->user_id
        ];
    }
}
