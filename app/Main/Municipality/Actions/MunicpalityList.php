<?php
namespace App\Main\Municipality\Actions;

use App\Http\Resources\MunicipalityResource;
use App\Main\Municipality\Repository\MunicipalityRepositoryInterface;

class MunicipalityList
{
    public function __construct(
        private MunicipalityRepositoryInterface $municipalityRepository
    )
    {}

    public function listAll()
    {
        return MunicipalityResource::collection(
            $this->municipalityRepository->listAll()
        );
    }

    public function find(int $id)
    {
        return new MunicipalityResource(
            $this->municipalityRepository->find($id)
        );
    }
}
