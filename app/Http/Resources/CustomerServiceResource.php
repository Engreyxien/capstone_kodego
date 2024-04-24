<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerServiceResource extends JsonResource
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
            'cs_name' => $this->cs_name,
            'cs_description' => $this->cs_description,
            'user_id' => $this->user_id,
            'tour_id' => $this->tour_id,
            'accommodation_id' => $this->accommodation_id
        ];
    }
}
