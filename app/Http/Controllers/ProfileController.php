<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * @throws ConnectionException
     */
    public function index()
    {
        $response = Http::api()->get('/profile');

        if ($response->failed()) {
            abort($response->status());
        }

        return view('profile.index', [
            'user' => $response->json('user'),
            'telegram' => $response->json('telegram'),
        ]);
    }

    /**
     * @throws ConnectionException
     */
    public function update(Request $request): RedirectResponse
    {
        $response = Http::api()->post('/profile/update', [
            'chat_id' => $request->chat_id,
            'username' => $request->username,
        ]);

        if ($response->failed()) {
            if ($response->status() === 422) {
                throw ValidationException::withMessages([
                    'chat_id' => $response->json('message'),
                ]);
            }

            abort($response->status());
        }

        return redirect()->back()->with('success', $response->json('success'));
    }
}
