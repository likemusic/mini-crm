<?php


namespace App\Common\Page\Element\Screen\Form\Field\RelationWithData;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Orchid\Platform\Dashboard;

class ServiceProvider extends BaseServiceProvider
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
