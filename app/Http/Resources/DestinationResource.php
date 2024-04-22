<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
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
            'destination_name' => $this->destination_name,
            'destination_description' => $this->destination_description,
            'destination_image' => $this->destination_image,
            'tour_id' => $this->tour_id,
            'user_id' => $this->user_id
        ];
    }
}
