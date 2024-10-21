<?php

namespace App\Http\Resources;

use App\Models\Neighbourhood;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FindSectorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "name" => $this->name,
            "municipality" => new MunicipalityResource($this->municipality),
            "neighbourhood" => new NeighbourhoodResource($this->neighbourhood),
            "city" => new CityResource($this->municipality->city)
        ];;
    }
}
