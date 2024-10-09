<?php
namespace App\Main\City\Repository;

use App\Models\City;

interface CityRepositoryInterface
{
    public function create(array $requests): City;
    public function findByName(string $name): ?City;
}
