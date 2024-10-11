<?php
namespace App\Main\Neighbourhood\Actions;

use App\Main\Neighbourhood\Repository\NeighbourhoodRepositoryInterface;

class NeighbourhoodCreate
{
    public function __construct(
        private NeighbourhoodRepositoryInterface $neighbourhoodRepository
    )
    {}
}
