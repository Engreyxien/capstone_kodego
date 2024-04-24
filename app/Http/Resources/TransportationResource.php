<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransportationResource extends JsonResource
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
            'transpo_type' => $this->transpo_type,
            'transpo_description' => $this->transpo_description,
            'transpo_price' => $this->transpo_price,
            'tour_id' => $this->tour_id,
            'user_id' => $this->user_id,
        ];
    }
}
