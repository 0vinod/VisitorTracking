<?php

namespace Vinod\VisitorTracking;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Vinod\VisitorTracking\Middleware\VisitorTracking;

class VisitorTrackingServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

public function boot(Router $router)
{
    $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

    $this->loadViewsFrom(__DIR__ . '/resources/views', 'visitor');

    $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

    Blade::componentNamespace(
        'Vinod\\VisitorTracking\\View\\Components',
        'visitor'
    );

    $router->aliasMiddleware('visitor_tracking', VisitorTracking::class);

    $router->pushMiddlewareToGroup('web', VisitorTracking::class);
}
}