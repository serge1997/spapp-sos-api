<?php
namespace App\Main\Sector\Repository;

use App\Models\Sector;
use App\Models\Municipality;

class SectorRepository implements SectorRepositoryInterface
{
    public function create(array $data) : Sector
    {
        return Sector::create($data);
    }

    public function listAllByMunicipality(Municipality $municipality)
    {
        return Sector::where('municipality_id', $municipality->id)->get();
    }
    public function find(int $id) : Sector
    {
        return Sector::find($id);
    }
}
