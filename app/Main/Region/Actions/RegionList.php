<?php
namespace App\Main\Region\Actions;

use App\Http\Resources\RegionResource;
use App\Main\Region\Repository\RegionRepositoryInterface;

class RegionList
{
    public function __construct(private RegionRepositoryInterface $regionRepository)
    {}

    public function listAll()
    {
        return RegionResource::collection(
            $this->regionRepository->listAll()
        );
    }

    public function find(int $id)
    {
        return new RegionResource(
            $this->regionRepository->find($id)
        );
    }
}
