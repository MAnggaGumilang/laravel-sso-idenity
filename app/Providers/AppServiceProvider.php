<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // tidak perlu binding apa pun untuk authorize view
    }

    public function boot(): void
    {
        // Pakai view lokal kamu sendiri (bukan passport::authorize)
        Passport::authorizationView('auth.oauth.authorize');
    }
}
