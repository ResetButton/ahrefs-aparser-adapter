<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use ResetButton\AparserPhpClient\Aparser;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Aparser::class, function (Application $app) {
            return new Aparser(config('aparser.url'), config('aparser.password'));
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
