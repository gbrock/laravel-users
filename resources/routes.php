<?php

if(config('users.login_url_alias'))
{
    Route::get(config('users.login_url_alias'), function () {
        // Alias for login page
        return redirect()->action('Auth\AuthController@getLogin');
    });
}

// Authentication routes...
Route::get(config('users.login_url', 'auth/login'), 'Auth\AuthController@getLogin');
Route::post(config('users.login_url', 'auth/login'), 'Auth\AuthController@postLogin');
Route::get(config('users.logout_url', 'auth/logout'), 'Auth\AuthController@getLogout');

// Registration routes...
Route::get(config('users.register_url', 'auth/register'), 'Auth\AuthController@getRegister');
Route::post(config('users.register_url', 'auth/register'), 'Auth\AuthController@postRegister');

// Oauth authentication
Route::get(config('users.social_login_url', 'auth/social') . '/{provider}', 'Auth\Auth\AuthController@redirectToProvider');
Route::get(config('users.social_login_url', 'auth/social') . '/{provider}/cb', 'Auth\Auth\AuthController@handleProviderCallback');
