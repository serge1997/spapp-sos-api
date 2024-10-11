<?php
namespace App\Main\Municipality\Actions;

use App\Http\Resources\MunicipalityResource;
use App\Main\Municipality\Repository\MunicipalityRepositoryInterface;
use App\Main\Municpality\Exception\MunicipalityExcpetion;

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
        $municpality = $this->municipalityRepository->find($id);
        if (!empty($municpality)){
            return new MunicipalityResource(
                $municpality
            );
        }
        throw new MunicipalityExcpetion("l'identificateur introuvale");
    }
}
