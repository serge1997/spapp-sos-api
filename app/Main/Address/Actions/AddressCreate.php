<?php
namespace App\Main\Address\Actions;

use App\Main\Address\Repository\AddressRepositoryInterface;
use App\Main\City\Repository\CityRepositoryInterface;
use App\Main\Municipality\Repository\MunicipalityRepositoryInterface;
use App\Main\Neighbourhood\Repository\NeighbourhoodRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class AddressCreate
{
    public function __construct(
        private AddressRepositoryInterface $addressRepository,
        private CityRepositoryInterface $cityRepository,
        private MunicipalityRepositoryInterface $municipalityRepository,
        private NeighbourhoodRepositoryInterface $neighbourhoodRepository
    )
    {}


    public function run(FormRequest $request)
    {
        $city = $this->cityRepository->findOrCreate($request);
        $municipality = $this->municipalityRepository->findOrCreate($request, $city);
        $neighbourhood = $this->neighbourhoodRepository->findOrCreate($request, $municipality);
    }
}
