<?php

namespace App\Framework\ServiceProviders;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BaseRouteServiceProvider;
use App\DataProvider\Entity\RoutePlaceholderProvider;
use App\DataProvider\Entity\ModelClassNameProvider;
use App\Contract\Entity\NameInterface as EntityNameInterface;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    /**
     * @var RoutePlaceholderProvider
     */
    private $entityRoutePlaceholderProvider;

    /**
     * @var ModelClassNameProvider
     */
    private $modelClassNameProvider;

    public function __construct(Application $app)
    {
        parent::__construct($app);

        $this->entityRoutePlaceholderProvider = $app->get(RoutePlaceholderProvider::class);
        $this->modelClassNameProvider = $app->get(ModelClassNameProvider::class);
    }

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->setModelsBinding();
    }

    private function setModelsBinding()
    {
        $entityCodes = [
            EntityNameInterface::PRODUCT,
            EntityNameInterface::ROLE,
        ];

        $this->setModelBindingByEntityCodes($entityCodes);
    }

    private function setModelBindingByEntityCodes(array $entityCodes)
    {
        foreach ($entityCodes as $entityCode) {
            $this->setModelBindingByEntityCode($entityCode);
        }
    }

    private function setModelBindingByEntityCode(string $entityCode)
    {
        $routePlaceholder = $this->getRoutePlaceholderByEntityCode($entityCode);
        $modelClassName = $this->getModelClassNameByEntityCode($entityCode);

        $this->bindRoutePlaceholder($routePlaceholder, $modelClassName);
    }

    private function getModelClassNameByEntityCode(string $entityCode)
    {
        return $this->modelClassNameProvider->getClassNameByEntityCode($entityCode);
    }

    private function getRoutePlaceholderByEntityCode(string $entityCode)
    {
        return $this->entityRoutePlaceholderProvider->getRoutePlaceholderByEntityCode($entityCode);
    }

    private function bindRoutePlaceholder(string $routePlaceholder, string $modelClassName)
    {
        Route::model($routePlaceholder, $modelClassName);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
