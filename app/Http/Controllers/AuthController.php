<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\ApiToken;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Database\QueryException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $request->ensureIsNotRateLimited();

        $response = $this->authService->login($data['name'], $data['password']);

        if ($response->failed()) {
            RateLimiter::hit($request->throttleKey());

            throw ValidationException::withMessages([
                'name' => trans('auth.failed'),
            ]);
        }

        $responseData = $response->json();

        $dataUser = $responseData['user'];
        $dataUser['password'] = Hash::make($data['password']);

        try {
            $user = User::where('name', $dataUser['name'])->first();

            if (!$user) {
                $user = User::create($dataUser);
            }

            $token = ApiToken::updateOrCreate(['app_name' => config('app.name'), 'user_id' => $user->id], [
                'user_id' => $user->id,
                'token' => $responseData['token'],
                'app_name' => config('app.name'),
            ]);


            if (!$token) {
                throw ValidationException::withMessages([
                    'name' => trans('auth.failed'),
                ]);
            }
        } catch (QueryException|\Exception $e) {
            throw ValidationException::withMessages([
                'name' => trans('auth.failed'),
            ]);
        }

        Auth::attempt(['name' => $data['name'], 'password' => $data['password']], true);

        RateLimiter::clear($request->throttleKey());

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     * @throws ConnectionException
     */
    public function destroy(Request $request): RedirectResponse
    {
        Http::api()->post('/logout');

        ApiToken::where('user_id', $request->user()->id)->where('app_name', config('app.name'))->delete();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
