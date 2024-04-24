<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
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
            'province_name' => $this->province_name,
            'reg_code' => $this->reg_code,
            'prov_code' => $this->prov_code,
            'country_id' => $this->country_id
        ];
    }
}
