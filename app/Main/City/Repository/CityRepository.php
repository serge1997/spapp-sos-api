<?php
namespace App\Main\City\Repository;

use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function create(array $requests): City
    {
        return City::create($requests);
    }

    public function listAll()
    {
        return City::all();
    }

    public function findByName(string $name): ?City
    {
        return City::where("name", $name)->first();
    }
    public function find(int $id): City
    {
        return City::find($id);
    }
    public function findOrCreate($request)
    {
        $cityFinded = $this->findByName($request->city);
        if (empty($cityFinded)){
            $city = new City();
            $city->name = $request->city;
            $city->origin = $request->origin;
            $city->save();
            return $city;
        }
        return $cityFinded;
    }
}
