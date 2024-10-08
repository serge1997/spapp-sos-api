<?php
namespace App\Main\Region\Repository;

use App\Models\Region;

class RegionRepository implements RegionRepositoryInterface
{
    public function create($request)
    {

    }

    public function find(int $id): ?Region
    {
        return new Region();
    }

    public function findByName(string $name): ?Region
    {
        return Region::where("name", $name)->first();
    }
}
