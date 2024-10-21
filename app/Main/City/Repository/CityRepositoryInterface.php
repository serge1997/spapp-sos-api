<?php
namespace App\Main\City\Repository;

use App\Models\City;

interface CityRepositoryInterface
{
    public function create(array $requests): City;
    public function findOrCreate($request);
    public function listAll();
    public function findByName(string $name): ?City;
    public function find(int $id): City;
}
