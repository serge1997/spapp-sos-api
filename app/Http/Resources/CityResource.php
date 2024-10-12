<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"         => $this->id,
            "name"       => $this->name,
            "population" => $this->population,
            "region_id"  => $this->region_id,
            "district"   => $this->district,
            "longitude"  => $this->longitude,
            "latitude"   => $this->latitude
        ];
    }
}
