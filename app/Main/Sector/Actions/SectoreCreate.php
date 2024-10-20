<?php
namespace App\Main\Sector\Actions;

use App\Http\Resources\SectorResource;
use App\Main\Sector\Repository\SectorRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;

class SectorCreate
{
    public function __construct(
        private SectorRepositoryInterface $sectorRepository
    )
    {}

    public function run(FormRequest $request)
    {
        return new SectorResource(
            $this->sectorRepository->create($request->validated())
        );
    }
}
