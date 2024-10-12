<?php
namespace App\Main\Neighbourhood\Actions;

use App\Http\Resources\NeighbourhoodResource;
use App\Main\Neighbourhood\Repository\NeighbourhoodRepositoryInterface;

class NeighbourhoodList
{
    public function __construct(
        private NeighbourhoodRepositoryInterface $neighbourhoodRepository
    )
    {}

    public function listAll()
    {
        return NeighbourhoodResource::collection(
            $this->neighbourhoodRepository->listAll()
        );
    }
}
