<?php
namespace App\Main\Region\Repository;

use App\Models\Region;

interface RegionRepositoryInterface
{
    public function create($request);
    public function find(int $id): ?Region;
    public function findByName(string $name): ?Region;
}
