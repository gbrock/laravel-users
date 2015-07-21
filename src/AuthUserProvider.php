<?php

namespace GridPrinciples\Users;

use App\Party;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider as BaseUserProvider;

class AuthUserProvider extends EloquentUserProvider implements BaseUserProvider {

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $email = array_get($credentials, 'email');

        $validUser = Party::has('user')->whereHas('emails', function ($q) use ($email) {
            $q->where('address', '=', $email);
        })->first()->user;

        return $validUser;
    }

}
