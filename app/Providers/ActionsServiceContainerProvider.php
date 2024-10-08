<?php

namespace App\Providers;

use App\Main\Applicant\ACtions\ComplainCreate;
use Illuminate\Support\ServiceProvider;

class ActionsServiceContainerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind("ComplainCreate", ComplainCreate::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
