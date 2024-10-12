<?php
namespace App\Main\Municipality\Actions;

use App\Main\Municipality\Repository\MunicipalityRepositoryInterface;
use App\Main\Municpality\Exception\MunicipalityException;
use Illuminate\Foundation\Http\FormRequest;

class MunicipalityCreate
{
    public function __construct(
        private readonly MunicipalityRepositoryInterface $municipalityRepository
    )
    {}

    public function run(FormRequest $request)
    {
        $municipality = $this->municipalityRepository->findByName($request->name());
        if (empty($municipality->id)){
            return $this->municipalityRepository->create($request->validated());
        }
        throw new MunicipalityException("La commune {$request->name()} existe dejá");
    }
}
