<?php
namespace App\Main\Neighbourhood\Repository;

use App\Models\Neighbourhood;

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
        return Neighbourhood::where([["name", $name], ["muncipality_id", $municipality]])
            ->first();
    }
}
