<?php
namespace App\Main\Municipality\Repository;

use App\Models\Municipality;
use App\Models\City;

interface MunicipalityRepositoryInterface
{
    public function create(array $requests) : Municipality;
    public function findOrCreate($request, City $city) : Municipality;
    public function listAll();
    public function findByName(string $name) : ?Municipality;
    public function find(int $id) : ?Municipality;
    public function update(array $requests) : Municipality;
}
