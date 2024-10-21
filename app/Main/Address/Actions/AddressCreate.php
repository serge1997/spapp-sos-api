<?php
namespace App\Main\Address\Actions;

use App\Main\Address\Exception\AddressException;
use App\Main\Address\Repository\AddressRepositoryInterface;
use App\Main\City\Repository\CityRepositoryInterface;
use App\Main\Municipality\Repository\MunicipalityRepositoryInterface;
use App\Main\Neighbourhood\Repository\NeighbourhoodRepositoryInterface;
use App\Main\Sector\Repository\SectorRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class AddressCreate
{
    public function __construct(
        private AddressRepositoryInterface $addressRepository,
        private CityRepositoryInterface $cityRepository,
        private MunicipalityRepositoryInterface $municipalityRepository,
        private NeighbourhoodRepositoryInterface $neighbourhoodRepository,
        private SectorRepositoryInterface $sectorRepository
    )
    {}


    public function run(FormRequest $request)
    {
        if (!$request->filled("street_name") && !$request->filled('sector')){
            throw new AddressException("informez le nom de la rue ou du secteur");
        }
        $city = $this->cityRepository->findOrCreate($request);
        $municipality = $this->municipalityRepository->findOrCreate($request, $city);
        $neighbourhood = $this->neighbourhoodRepository->findOrCreate($request, $municipality);
        if ($request->filled('sector')){
            $sector = $this->sectorRepository->findOrCreate($request, $neighbourhood, $municipality);
        }
    }
}
