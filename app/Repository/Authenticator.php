<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 05/12/15
 * Time: 10:53 AM
 */

namespace App;


interface Authenticator {


    public function authenticateUser($hasCode, $provider, $listener);

    public function getAuthorization($provider);

    public function getSocialUser($provider);
}