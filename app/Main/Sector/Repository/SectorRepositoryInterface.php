<?php
namespace App\Main\Sector\Repository;

use App\Models\Municipality;
use App\Models\Sector;

interface SectorRepositoryInterface
{
    public function create(array $data) : Sector;
    public function listAllByMunicipality(Municipality $municipality);
    public function find(int $id);
}
