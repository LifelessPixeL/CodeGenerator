<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\CsvHandlerService;

class CsvUploaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CsvHandlerService::class, function ($app) {
            return new CsvHandlerService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
