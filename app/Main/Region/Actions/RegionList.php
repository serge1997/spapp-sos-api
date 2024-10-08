<?php
namespace App\Main\Region\Actions;

use App\Main\Region\Repository\RegionRepositoryInterface;

class RegionList
{
    public function __construct(private RegionRepositoryInterface $regionRepository)
    {}
}
