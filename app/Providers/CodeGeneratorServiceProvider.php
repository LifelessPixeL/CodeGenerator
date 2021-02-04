<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\CodeGeneratorService;

class CodeGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CodeGeneratorService::class, function ($app) {
            return new CodeGeneratorService();
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
