<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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
        Http::macro('api', function () {
            if(Auth::check()){
                return Http::withToken(Auth::user()->token)
                    ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])->baseUrl(config('app.api_url'));
            }

            return Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->baseUrl(config('app.api_url'));
        });
    }
}
