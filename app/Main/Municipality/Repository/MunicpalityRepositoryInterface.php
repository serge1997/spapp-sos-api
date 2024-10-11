<?php
namespace App\Main\Municipality\Repository;

use App\Models\Municipality;

interface MunicipalityRepositoryInterface
{
    public function create(array $requests) : Municipality;
    public function listAll();
    public function findByName(string $name) : Municipality;
    public function find(int $id) : ?Municipality;
    public function update(array $requests) : Municipality;
}
