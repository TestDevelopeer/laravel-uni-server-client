<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class ProfileService
{
    protected string|null $token = null;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @throws ConnectionException
     */
    public function getProfileInfo()
    {
        return Http::api($this->token)->get('/profile');
    }

    /**
     * @throws ConnectionException
     */
    public function updateProfileChatId($chatId)
    {
        return Http::api()->post('/profile/update', [
            'chat_id' => $chatId
        ]);
    }
}
