<?php

namespace App\Providers;

use App\Main\Applicant\Repository\ApplicantRepository;
use App\Main\Applicant\Repository\ApplicantRepositoryInterface;
use App\Main\City\Repository\CityRepositoryInterface;
use App\Main\City\Repository\CityRepository;
use App\Main\Municipality\Repository\MunicipalityRepositoryInterface;
use App\Main\Municipality\Repository\MunicipalityRepository;
use App\Main\Region\Repository\RegionRepository;
use App\Main\Region\Repository\RegionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceContainerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ApplicantRepositoryInterface::class, ApplicantRepository::class);
        $this->app->bind(RegionRepositoryInterface::class, RegionRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(MunicipalityRepositoryInterface::class, MunicipalityRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
