<?php
namespace App\Main\Neighbourhood\Repository;

use App\Models\Neighbourhood;

interface NeighbourhoodRepositoryInterface
{
    public function create(array $requests) : Neighbourhood;
    public function listAll();
    public function findByName(string $name) : ?Neighbourhood;
    public function findByNameAndMunicipality(string $name, int $municipality) : ?Neighbourhood;
    public function find(int $id);
}
