<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Google\Interfaces\GoogleInterface;
use App\Services\Google\Index as GoogleIndex;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GoogleInterface::class, 
            function( $app, array $parameters) {
                return new GoogleIndex( $parameters[0] );
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
