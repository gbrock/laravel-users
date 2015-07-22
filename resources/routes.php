<?php

if(config('users.login_url_alias'))
{
    Route::get(config('users.login_url_alias'), function () {
        // Alias for login page
        return redirect()->action('GridPrinciples\Users\Http\Auth\AuthController@getLogin');
    });
}

// Authentication routes...
Route::get(config('users.login_url', 'auth/login'), 'GridPrinciples\Users\Http\Auth\AuthController@getLogin');
Route::post(config('users.login_url', 'auth/login'), 'GridPrinciples\Users\Http\Auth\AuthController@postLogin');
Route::get(config('users.logout_url', 'auth/logout'), 'GridPrinciples\Users\Http\Auth\AuthController@getLogout');

// Registration routes...
Route::get(config('users.register_url', 'auth/register'), 'GridPrinciples\Users\Http\Auth\AuthController@getRegister');
Route::post(config('users.register_url', 'auth/register'), 'GridPrinciples\Users\Http\Auth\AuthController@postRegister');

// Oauth authentication
Route::get(config('users.social_login_url', 'auth/social') . '/{provider}', 'GridPrinciples\Users\Http\Auth\Auth\AuthController@redirectToProvider');
Route::get(config('users.social_login_url', 'auth/social') . '/{provider}/cb', 'GridPrinciples\Users\Http\Auth\Auth\AuthController@handleProviderCallback');
