<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use App\Repositories\Db\Product\ProductRepositoryInterface;
// use App\Repositories\Db\Product\ProductRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Db\Product\ProductRepositoryInterface','App\Repositories\Db\Product\ProductRepository'
            // ProductRepositoryInterface::class,ProductRepository::class
        );
    }
}
