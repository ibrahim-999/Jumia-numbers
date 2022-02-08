<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Customers\SqliteCustomerRepository;
use App\Repositories\Customers\CustomerRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomerRepositoryInterface::class, SqliteCustomerRepository::class);
    }
}
