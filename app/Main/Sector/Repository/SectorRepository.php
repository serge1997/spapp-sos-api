<?php
namespace App\Main\Sector\Repository;

use App\Models\Sector;

class SectorRepository implements SectorRepositoryInterface
{
    public function create(array $data) : Sector
    {
        return Sector::create($data);
    }
}
