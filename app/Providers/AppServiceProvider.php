<?php

namespace App\Providers;

use App\Models\ContactInfo;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        View::composer('*', function ($view) {
            $view->with('contact', ContactInfo::first());
        });
    }
    // public function boot(): void
    // {
    //     View::composer('*', function ($view) {
    //         $view->with('contact', Contact::first());
    //     });
    // }
}
