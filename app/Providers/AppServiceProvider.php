<?php

namespace App\Providers;

use App\Models\Shop;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('view-shop', function(User $user, Shop $shop){
            return ($user->shops->contains('id', $shop->id) || $user->isAdmin());
        });
    }
}
