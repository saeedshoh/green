<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Response::macro('success', function ($message, $status = 200) {
            return response()->json(['message' => $message], $status);
        });

        Response::macro('error', function ($message, $status = 401) {
            return response()->json(['message' => $message], $status);
        });

        Paginator::useBootstrap();
    }
}
