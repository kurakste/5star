<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BillingController;

class BillingProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    $this->app->bind('App\Helpers\BillingContract', function(){
               return new BillingController();
                });
    }
}
