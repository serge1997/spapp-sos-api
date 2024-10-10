<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MunicipalityResource extends JsonResource
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
            "city_id"    => $this->city_id,
            "city"       => $this->city,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "longitude"  => $this->longitude,
            "latitude"   => $this->latitude
        ];
    }
}
