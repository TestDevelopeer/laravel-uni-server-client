<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    protected ProfileService $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function show()
    {
        $response = $this->profileService->getProfileInfo();

        if ($response->failed()) {
            abort($response->status());
        }

        $data = $response->json();

        return view('profile.index', [
            'user' => $data['user'],
            'telegram' => $data['telegram'],
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $response = $this->profileService->updateProfileChatId($data['chat_id']);

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
