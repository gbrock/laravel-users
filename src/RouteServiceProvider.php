<?php

namespace GridPrinciples\Users;

use Illuminate\Routing\Router;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider {

    protected $namespace = 'GridPrinciples\Users\Http\Controllers';

    public function map(Router $router)
    {
        if (! $this->app->routesAreCached()) {
            $router->group(['namespace' => $this->namespace], function($router) {
                    require __DIR__.'/../resources/routes.php';
            });
        }
    }
}
