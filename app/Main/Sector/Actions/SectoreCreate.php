<?php
namespace App\Main\Sector\Actions;

use App\Main\Sector\Repository\SectorRepositoryInterface;

class SectorCreate
{
    public function __construct(
        private SectorRepositoryInterface $sectorRepository
    )
    {}
}
