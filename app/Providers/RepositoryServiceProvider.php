<?php

namespace App\Providers;

use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\CarServiceInterface;
use App\Repositories\CarRepository;
use App\Services\CarService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CarRepositoryInterface::class,CarRepository::class);
        $this->app->bind(CarServiceInterface::class,CarService::class);
    }
}
