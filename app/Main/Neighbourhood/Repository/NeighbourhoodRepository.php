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

    }

    public function findByName(string $name) : ?Neighbourhood
    {
        return Neighbourhood::where("name", $name)->first();
    }
    public function find(int $id)
    {
        return Neighbourhood::where("id", $id)->first();
    }
}
