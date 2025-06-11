<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws ConnectionException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $response = Http::api()->post('/login', [
            'name' => $this->name,
            'password' => $this->password
        ]);

        if ($response->failed()) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'name' => trans('auth.failed'),
            ]);
        }

        $data = $response->json();

        $dataUser = $data['user'];
        $dataUser['token'] = $data['token'];
        $dataUser['password'] = Hash::make($this->password);

        $user = User::updateOrCreate(['name' => $dataUser['name']], $dataUser);

        if(!$user) {
            throw ValidationException::withMessages([
                'name' => trans('auth.failed'),
            ]);
        }

        Auth::attempt(['name' => $this->name, 'password' => $this->password], true);

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'name' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('name')).'|'.$this->ip());
    }
}
