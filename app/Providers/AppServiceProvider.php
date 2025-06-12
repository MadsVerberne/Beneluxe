<?php

namespace App\Providers;

use App\Models\accommodatie;
use App\Policies\AccommodatiePolicy;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    protected $policies = [
        accommodatie::class => AccommodatiePolicy::class,
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        App::setLocale('nl'); // handmatig zetten, of automatisch op basis van sessie/gebruiker
    }
}
