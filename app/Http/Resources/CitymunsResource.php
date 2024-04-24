<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CitymunsResource extends JsonResource
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
            'citymun_name' => $this->citymun_name,
            'reg_code' => $this->reg_code,
            'prov_code' => $this->prov_code,
            'citymun_code' => $this->citymun_code,
            'country_id' => $this->country_id
        ];
    }
}
