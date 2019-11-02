<?php

namespace App\Framework\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Menu\Main\Composer as MainMenuComposer;

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
        View::composer('sections.main', MainMenuComposer::class);
    }
}
