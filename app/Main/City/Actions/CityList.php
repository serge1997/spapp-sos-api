<?php
namespace App\Main\City\Actions;

use App\Http\Resources\CityResource;
use App\Main\City\Repository\CityRepositoryInterface;

class CityList
{
    public function __construct(
        private readonly CityRepositoryInterface $cityRepository
    ){}

    public function listAll()
    {
        return CityResource::collection(
            $this->cityRepository->listAll()
        );
    }
}
