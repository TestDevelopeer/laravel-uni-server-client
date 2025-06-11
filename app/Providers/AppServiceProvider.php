<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Psr7\Response;

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
        Http::macro('api', function ($token = null) {
            if ($token !== null || Auth::check()) {
                return Http::globalResponseMiddleware(
                    function ($response) {
                        if ($response->getStatusCode() === 401) {
                            Auth::guard('web')->logout();
                        }

                        return $response;
                    }
                )->withToken($token ?? Auth::user()->token)
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

        Http::macro('uniserver', function () {
            return Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])->baseUrl(config('services.uniserver.api_url'));
        });
    }
}
