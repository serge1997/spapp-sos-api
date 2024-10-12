<?php
namespace App\Main\Neighbourhood\Actions;

use App\Main\Neighbourhood\Exception\NeighbourhoodException;
use App\Main\Neighbourhood\Repository\NeighbourhoodRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class NeighbourhoodCreate
{
    public function __construct(
        private NeighbourhoodRepositoryInterface $neighbourhoodRepository
    )
    {}

    public function run(FormRequest $request)
    {
        $neighbourhood = $this->neighbourhoodRepository
            ->findByNameAndMunicipality($request->name(), $request->municipalityId());

        if (!$neighbourhood) {
            return $this->neighbourhoodRepository
                ->create($request->validated());
        }
        throw new NeighbourhoodException("Le quartier {$request->name()} exist déja");
    }
}
