<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\paginator;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //scope all aplication
       // echo 'laravel';
       paginator::defaultView('vendor.pagination.bootstrap-4');

       paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-4');
    }
}
