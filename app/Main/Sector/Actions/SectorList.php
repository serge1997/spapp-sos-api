<?php
namespace App\Main\Sector\Actions;

use App\Main\Sector\Repository\SectorRepositoryInterface;

class SectorList
{
    public function __construct(
        private SectorRepositoryInterface $sectorRepository
    ){}
}
