<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 05/12/15
 * Time: 9:50 AM
 */

namespace App;

use Laravel\Socialite\Contracts\Factory as Socialite;

class AuthenticateUser implements Authenticator {


    private $socialite;
    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }

    public function authenticateUser($hasCode, $provider, $listener)
    {
        if (! $hasCode) {
            return $this->getAuthorization($provider);
        }

        $user = $this->getSocialUser($provider);

        return $listener->userAuthenticated($user);
    }

    public function getAuthorization($provider)
    {
        return $this->socialite->driver($provider)->redirect();
    }

    public function getSocialUser($provider)
    {
        return $this->socialite->driver($provider)->user();
    }
}