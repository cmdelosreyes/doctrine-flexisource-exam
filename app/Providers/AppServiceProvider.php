<?php

namespace App\Providers;

use App\Services\Contracts\ImportContract;
use App\Services\DataImportService;
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
        $this->app->bind(ImportContract::class, function () {
            return new DataImportService(config('services.randomuser.base_url'));
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
