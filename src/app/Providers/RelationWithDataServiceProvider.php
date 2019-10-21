<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Platform\Dashboard;

class RelationWithDataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param Dashboard $dashboard
     * @return void
     */
    public function boot(Dashboard $dashboard)
    {
        $dashboard->registerResource('scripts','/js/dashboard.js');
        //$dashboard->registerResource('stylesheets','dashboard.css');
    }
}
