<?php
namespace App\Main\Region\Actions;

use App\Http\Resources\RegionResource;
use App\Main\Region\Exception\RegionException;
use App\Main\Region\Repository\RegionRepositoryInterface;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Region;

class RegionCreate
{
    public function __construct(private RegionRepositoryInterface $regionRepository)
    { }

    public function run(FormRequest $request)
    {
        $region = $this->regionRepository->findByName($request->name());
        if (!empty($region->name)){
            throw new RegionException("La région {$request->name()} exist déja");
        }
        return new RegionResource(
            $this->regionRepository->create($request->validated())
        );
    }
}
