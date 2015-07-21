<?php

namespace GridPrinciples\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    public function register()
    {
        Auth::extend('gridprinciples', function($app) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            return new AuthUserProvider(new BcryptHasher(), '\App\User');
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }
}
