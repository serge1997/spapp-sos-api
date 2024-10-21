<?php
namespace App\Main\Sector\Actions;

use App\Http\Resources\FindSectorResource;
use App\Http\Resources\SectorResource;
use App\Main\Municipality\Repository\MunicipalityRepositoryInterface;
use App\Main\Municpality\Exception\MunicipalityException;
use App\Main\Sector\Exception\SectorException;
use App\Main\Sector\Repository\SectorRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class SectorList
{
    public function __construct(
        private SectorRepositoryInterface $sectorRepository,
        private MunicipalityRepositoryInterface $municipalityRepository
    ){}

    public function findAllByMunicpality($municipality_id)
    {
        if (!$municipality_id){
            throw new SectorException("Commune obligatoire pour lister les secteurs");
        }
        $municipality = $this->municipalityRepository->find($municipality_id);
        if (empty($municipality)){
            throw new MunicipalityException("l'identificateur de la commune est obligatoire");
        }
        return SectorResource::collection(
            $this->sectorRepository->listAllByMunicipality($municipality)
        );
    }
    public function findById(int $id)
    {
        return new FindSectorResource(
            $this->sectorRepository->find($id)
        );
    }
}
