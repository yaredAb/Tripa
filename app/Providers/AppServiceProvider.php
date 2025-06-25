<?php

namespace App\Providers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view){
            $user = Auth::user();
            $organizer_name = $user?->organizer?->name ?? null;
            $profile_img = $user?->organizer?->profile_img ?? null;

            $view->with(['organizer_name' => $organizer_name, 'profile_img' => $profile_img]);
        });
    }
}
