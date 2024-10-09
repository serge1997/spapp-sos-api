<?php
namespace App\Main\City\Actions;

use App\Main\City\Exception\CityException;
use App\Main\City\Repository\CityRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class CityCreate
{
    public function __construct(private CityRepositoryInterface $cityRepository)
    {}

    public function run(FormRequest $request)
    {
        $city = $this->cityRepository->findByName($request->name());
        if (empty($city->id)) {
            return $this->cityRepository->create($request->validated());
        }
        throw new CityException("La ville {$request->name()} exist déja");
    }
}
