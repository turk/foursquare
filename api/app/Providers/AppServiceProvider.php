<?php

namespace App\Providers;

use App\Services\API\FoursquareApi;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(FoursquareApi::class, function () {
            return new FoursquareApi(
                new Client([
                    'base_uri' => 'https://api.foursquare.com/',
                    'headers' => ['Accept' => 'application/json'],
                    'verify' => false,
                ])
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
