<?php

namespace GridPrinciples\Users;

use GridPrinciples\BladeForms\BladeFormsServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    public function register()
    {
        // Merge our configuration with user's configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/users.php', 'users'
        );

        // Extend the Auth facade with our own provider
        Auth::extend('gridprinciples', function($app) {
            return new AuthUserProvider(new BcryptHasher(), '\App\User');
        });

        // Load Blade forms
        $this->app->register(BladeFormsServiceProvider::class);

        // Load Route provider
        $this->app->register(RouteServiceProvider::class);
    }

    public function boot()
    {
        // Publish the config file
        $this->publishes([
            __DIR__.'/../config/users.php' => config_path('users.php'),
        ]);

        // Publish migrations
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
