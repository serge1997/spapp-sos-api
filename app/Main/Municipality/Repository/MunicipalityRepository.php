<?php
namespace App\Main\Municipality\Repository;

use App\Main\Municpality\Exception\MunicipalityExcpetion;
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

    public function findByName(string $name) : Municipality
    {
        return Municipality::where("name", $name)->first();
    }
    public function update(array $requests) : Municipality
    {
        throw new MunicipalityExcpetion("Method not implemented");
    }
}
