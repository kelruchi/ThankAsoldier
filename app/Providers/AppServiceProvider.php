<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Authenticator;
use App\AuthenticateUser;
use Laravel\Socialite\Contracts\Factory;
use Laravel\Socialite\SocialiteManager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->configure('services');
        $this->app->configure('session');
        $this->app->bind(Authenticator::class, AuthenticateUser::class);

    }
}
