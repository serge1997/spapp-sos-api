<?php
namespace App\Main\Neighbourhood\Actions;

use App\Main\Neighbourhood\Repository\NeighbourhoodRepositoryInterface;

class NeighbourhoodList
{
    public function __construct(
        private NeighbourhoodRepositoryInterface $neighbourhoodRepository
    )
    {}
}
