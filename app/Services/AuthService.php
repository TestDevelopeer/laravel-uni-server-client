<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct()
    {
    }

    public function login($name, $password)
    {
        return Http::api()->post('/login', [
            'name' => $name,
            'password' => $password,
        ]);
    }
}
