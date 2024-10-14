<?php
namespace App\Main\Sector\Repository;

use App\Models\Sector;

interface SectorRepositoryInterface
{
    public function create(array $data) : Sector;
}
