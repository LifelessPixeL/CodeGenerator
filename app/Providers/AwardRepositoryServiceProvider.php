<?php

namespace App\Providers;

use App\Repository\AwardRepositoryInterface;
use App\Repository\Eloquent\AwardRepository;
use Illuminate\Support\ServiceProvider;

class AwardRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AwardRepositoryInterface::class, AwardRepository::class);
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
