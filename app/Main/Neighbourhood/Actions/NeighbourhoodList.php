<?php
namespace App\Main\Neighbourhood\Actions;

use App\Http\Resources\FindNeighbourhoodResource;
use App\Http\Resources\NeighbourhoodResource;
use App\Main\Neighbourhood\Exception\NeighbourhoodException;
use App\Main\Neighbourhood\Repository\NeighbourhoodRepositoryInterface;
use App\Models\Neighbourhood;
use Illuminate\Http\Resources\Json\JsonResource;

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

    public function find(int $id) : JsonResource
    {
        $neighbourhood = $this->neighbourhoodRepository->find($id);
        if (!empty($neighbourhood)){
            return new FindNeighbourhoodResource($neighbourhood);
        }
        throw new NeighbourhoodException("l'identificateur introuvable");
    }
}
