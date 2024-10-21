<?php

namespace App\Providers;

use App\Main\Address\Actions\AddressCreate;
use App\Main\Applicant\Actions\ComplainCreate;
use App\Main\City\Actions\CityCreate;
use App\Main\City\Actions\CityList;
use App\Main\Municipality\Actions\MunicipalityCreate;
use App\Main\Municipality\Actions\MunicipalityList;
use App\Main\Neighbourhood\Actions\NeighbourhoodCreate;
use App\Main\Neighbourhood\Actions\NeighbourhoodList;
use App\Main\Region\Actions\RegionCreate;
use App\Main\Region\Actions\RegionList;
use App\Main\Sector\Actions\SectorCreate;
use App\Main\Sector\Actions\SectorList;
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
        $this->app->bind(CityCreate::class, CityCreate::class);
        $this->app->bind(CityList::class, CityList::class);
        $this->app->bind(MunicipalityCreate::class, MunicipalityCreate::class);
        $this->app->bind(MunicipalityList::class, MunicipalityList::class);
        $this->app->bind(NeighbourhoodCreate::class, NeighbourhoodCreate::class);
        $this->app->bind(NeighbourhoodList::class, NeighbourhoodList::class);
        $this->app->bind(SectorCreate::class, SectorCreate::class);
        $this->app->bind(SectorList::class, SectorList::class);
        $this->app->bind(AddressCreate::class, AddressCreate::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
