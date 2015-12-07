<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 04/12/15
 * Time: 8:55 PM
 */

namespace App\Http\Controllers;

use App\User;
use App\Authenticator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AuthController {

    private $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function doSocial(Request $request,Authenticator $authenticate,$provider)
    {
        return $authenticate->authenticateUser(($request->has('code') ||
            $request->has('oauth_token')), $provider, $this);
    }

    public function userAuthenticated($user)
    {
        $authUser = $this->findOrCreateUser($user);

        $this->login($authUser);
    }


    public function findOrCreateUser($user)
    {

        $authUser = User::firstOrNew(['oauth_id' => $user->id]);
        if(! is_null($authUser->id)) {
            return $authUser;
        }

        $authUser->username = ($user->name)? $user->name : $user->nickname;
        $authUser->email = ($user->email)? $user->email: "";
        $authUser->oauth_id = $user->id;
        $authUser->auth_token = $user->token;
        $authUser->password = bcrypt($user->id);

        $authUser->save();
        return $authUser;
    }


    public function login($user)
    {
        $this->auth->login($user, true);
        return redirect('home');
    }




}