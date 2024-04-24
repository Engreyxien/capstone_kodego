<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
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
            'tour_title' => $this->tour_title,
            'tour_description' => $this->tour_description,
            'tour_price' => $this->tour_price,
            'tour_duration' => $this->tour_duration,
            'country_id' => $this->country_id,
            'user_id' => $this->user_id
        ];
    }
}
