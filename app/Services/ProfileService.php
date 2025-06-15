<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ProfileService
{
    public function __construct()
    {
    }

    public function getProfileInfo()
    {
        return Http::api()->get('/profile');
    }

    public function updateProfileChatId($chatId)
    {
        return Http::api()->post('/profile/update', [
            'chat_id' => $chatId
        ]);
    }
}
