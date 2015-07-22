<?php

namespace GridPrinciples\Users;

use GridPrinciples\BladeForms\BladeFormsServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    public function register()
    {
        Auth::extend('gridprinciples', function($app) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            return new AuthUserProvider(new BcryptHasher(), '\App\User');
        });

        // Load Blade forms
        $this->app->register(BladeFormsServiceProvider::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
