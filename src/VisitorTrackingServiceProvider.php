<?php
// E:\xampp\htdocs\hnuman\packages\Vinod\VisitorTracking\src\VisitorTrackingServiceProvider.php

namespace Vinod\VisitorTracking;

use App\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Vinod\VisitorTracking\Middleware\VisitorTracking;
use Vinod\VisitorTracking\View\Components\CountryWidget;
use Vinod\VisitorTracking\Database\Seeders\VisitorSettingsSeeder;

class VisitorTrackingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register the middleware alias
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('visitor_tracking', VisitorTracking::class);

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'visitor');

        Blade::componentNamespace(
            'Vinod\VisitorTracking\\View\\Components',
            'visitor'
        );

        $router->aliasMiddleware('visitor_tracking', VisitorTracking::class);

        $router->pushMiddlewareToGroup('web', VisitorTracking::class);
 	$router->pushMiddlewareToGroup('api', VisitorTracking::class);

    }

    public function register()
    {
        //
    }
}
