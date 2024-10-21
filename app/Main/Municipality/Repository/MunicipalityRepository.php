<?php
namespace App\Main\Municipality\Repository;

use App\Main\Municpality\Exception\MunicipalityException;
use App\Models\City;
use App\Models\Municipality;
use Exception;

class MunicipalityRepository implements MunicipalityRepositoryInterface
{
    public function create(array $requests) : Municipality
    {
        return Municipality::create($requests);
    }

    public function listAll()
    {
        return Municipality::all();
    }
    public function find(int $id) : ?Municipality
    {
        return Municipality::find($id);
    }

    public function findByName(string $name) : ?Municipality
    {
        return Municipality::where("name", $name)->first();
    }
    public function update(array $requests) : Municipality
    {
        throw new MunicipalityException("Method not implemented");
    }
    public function findOrCreate($request, City $city) : Municipality
    {
        $municipalityFinded = $this->findByName($request->municipality);
        if (empty($municipalityFinded)){
            $municpality = new Municipality();
            $municpality->name = $request->municipality;
            $municpality->city_id = $city->id;
            $municpality->origin = $request->origin;
            $municpality->save();
            return $municpality;
        }
        return $municipalityFinded;
    }
}
