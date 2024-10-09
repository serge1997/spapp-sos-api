<?php
namespace App\Main\City\Repository;

use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function create(array $requests): City
    {
        return City::create($requests);
    }

    public function findByName(string $name): ?City
    {
        return City::where("name", $name)->first();
    }
}
