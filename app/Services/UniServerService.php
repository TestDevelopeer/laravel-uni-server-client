<?php

namespace App\Services;

use App\Models\User;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UniServerService
{
    protected string|null $lastRecordCode = null;
    protected array $user;
    protected string $token;

    public function __construct($token, $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * @throws ConnectionException
     */
    public function setLastRecordCode(): void
    {
        $response = Http::api($this->token)->get('/journal');
        if ($response->successful()) {
            $this->lastRecordCode = $response->json('journal')['CODE'];
        }
    }

    /**
     * @throws ConnectionException
     */
    public function checkForNewRecords()
    {
        $currentRecord = $this->getLastRecordCode();

        if (!$currentRecord) {
            return null;
        }

        if ($this->lastRecordCode === null) {
            $this->lastRecordCode = $currentRecord['CODE'];

            Http::api($this->token)->post('/journal', [
                'code' => $this->lastRecordCode
            ]);

            return null;
        }

        if ($currentRecord['CODE'] !== $this->lastRecordCode) {
            $this->lastRecordCode = $currentRecord['CODE'];

            Http::api($this->token)->post('/journal', [
                'code' => $this->lastRecordCode
            ]);

            return $currentRecord;
        }

        return null;
    }

    public function getLastRecordCode()
    {
        try {
            $response = Http::uniserver()->get("/SendMsg", [
                'Name' => 'AutoScaleJournal1_GetRecords',
                'Value' => json_encode(['Filter' => [], 'MaxRows' => 1], JSON_THROW_ON_ERROR),
                'auth_user' => $this->user['name'],
                'auth_password' => $this->user['password'],
            ]);

            $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            if (!empty($data) && is_array($data)) {
                return $data[0];
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Error fetching data from UniServer API: ' . $e->getMessage());
            return null;
        } catch (GuzzleException $e) {
            Log::error('GuzzleException Error fetching data from UniServer API: ' . $e->getMessage());
            return null;
        }
    }
}
