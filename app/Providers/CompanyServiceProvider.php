<?php

namespace App\Providers;

use App\Repositories\CompanyRepositoryInterface;
use App\Repositories\DatabaseCompanyRepository;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider {

    public function register()
    {
//        $this->app->bind(
//            CompanyRepositoryInterface::class,
//            DatabaseCompanyRepository::class
//        );

        $this->app->bind('app\Repositories\CompanyRepositoryInterface', 'App\Repositories\DatabaseCompanyRepository');
    }
}