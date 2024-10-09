<?php
namespace App\Main\Region\Repository;

use App\Models\Region;

class RegionRepository implements RegionRepositoryInterface
{
    public function create(array $requests): Region
    {
        return Region::create($requests);
    }

    public function listAll()
    {
        return Region::all();
    }

    public function find(int $id): ?Region
    {
        return Region::findOrFail($id);
    }

    public function findByName(string $name): ?Region
    {
        return Region::where("name", $name)->first();
    }
}
