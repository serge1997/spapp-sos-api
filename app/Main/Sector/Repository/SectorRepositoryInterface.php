<?php
namespace App\Main\Sector\Repository;

use App\Models\City;
use App\Models\Municipality;
use App\Models\Neighbourhood;
use App\Models\Sector;

interface SectorRepositoryInterface
{
    public function create(array $data) : Sector;
    public function findOrCreate($request, Neighbourhood $neighbourhood, ?Municipality $municipality = null, ?City $city = null);
    public function listAllByMunicipality(Municipality $municipality);
    public function find(int $id);
    public function findByNameAndNeighbourhoodAndMunicipality(string $name,Neighbourhood $neighbourhood, Municipality $municipality);
}
