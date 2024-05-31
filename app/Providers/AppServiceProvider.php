<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
// use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
// use Illuminate\View\View as ViewView;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrapFive();

        Gate::define('admin', function(User $user){
            return $user->role === 'admin';
        });
        Gate::define('pengelola', function(User $user){
            return $user->role === 'admin' || $user->role === 'pemilik';
        });
        Gate::define('pelanggan', function(User $user){
            return $user->role === 'pelanggan';
        });

        View::composer('layouts.main', function ($view) {
            if (Auth::check()) {
                $charts = Cart::where('user_id', Auth::user()->id)->get();
                $view->with('charts', $charts);
            }
        });
    }
}
