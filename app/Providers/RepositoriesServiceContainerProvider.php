<?php

namespace App\Providers;

use App\Main\Applicant\Repository\ApplicantRepository;
use App\Main\Applicant\Repository\ApplicantRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceContainerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ApplicantRepositoryInterface::class, ApplicantRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
