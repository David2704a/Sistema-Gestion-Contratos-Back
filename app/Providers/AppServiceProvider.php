<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    
        $this->app->bind('App\Services\UserService', 'App\Services\Implementations\UserServiceImpl');
    
        $this->app->bind('App\Services\AuthService', 'App\Services\Implementations\AuthServiceImpl');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
