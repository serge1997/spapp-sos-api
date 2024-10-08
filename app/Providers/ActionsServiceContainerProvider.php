<?php

namespace App\Providers;

use App\Main\Applicant\Actions\ComplainCreate;
use App\Main\Region\Actions\RegionCreate;
use App\Main\Region\Actions\RegionList;
use Illuminate\Support\ServiceProvider;

class ActionsServiceContainerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ComplainCreate::class, ComplainCreate::class);
        $this->app->bind(RegionCreate::class, RegionCreate::class);
        $this->app->bind(RegionList::class, RegionList::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
