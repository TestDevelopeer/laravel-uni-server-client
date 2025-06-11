<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    /**
     * @throws ConnectionException
     */
    public function edit()
    {
        $response = Http::api()->get('/profile');

        if($response->failed()){
            abort($response->status(), $response->body());
        }

        return view('settings.edit', [
            'user' => (object)$response->json('user'),
            'telegram' => (object)$response->json('telegram'),
        ]);
    }
}
