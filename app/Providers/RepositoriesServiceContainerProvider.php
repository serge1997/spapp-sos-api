<?php

namespace App\Providers;

use App\Main\Applicant\Repository\ApplicantRepository;
use App\Main\Applicant\Repository\ApplicantRepositoryInterface;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
