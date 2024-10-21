<?php
namespace App\Main\Neighbourhood\Repository;

use App\Models\Neighbourhood;
use App\Models\Municipality;

class NeighbourhoodRepository implements NeighbourhoodRepositoryInterface
{
    public function create(array $requests) : Neighbourhood
    {
        return Neighbourhood::create($requests);
    }

    public function listAll()
    {
        return Neighbourhood::all();
    }

    public function findByName(string $name) : ?Neighbourhood
    {
        return Neighbourhood::where("name", $name)->first();
    }
    public function find(int $id) : ?Neighbourhood
    {
        return Neighbourhood::find($id);
    }

    public function findByNameAndMunicipality(string $name, int $municipality) : ?Neighbourhood
    {
        return Neighbourhood::where([["name", $name], ["municipality_id", $municipality]])
            ->first();
    }
    public function findOrCreate($request, Municipality $municipality)
    {
        $find = $this->findByNameAndMunicipality($request->neighbourhood, $municipality->id);
        if (empty($find)){
            $neighbourhood = new Neighbourhood();
            $neighbourhood->name = $request->neighbourhood;
            $neighbourhood->municipality_id = $municipality->id;
            $neighbourhood->latitude = $request->latitude;
            $neighbourhood->longitude = $request->longitude;
            $neighbourhood->origin = $request->origin;
            $neighbourhood->save();
            return $neighbourhood;
        }
        return $find;
    }
}
