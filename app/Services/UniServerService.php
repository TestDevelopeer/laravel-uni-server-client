<?php

namespace App\Services;

use App\Models\Journal;
use App\Models\User;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UniServerService
{
    protected $lastRecordCode = null;
    protected $user = null;

    /**
     * @throws ConnectionException
     */
    public function __construct($userId)
    {
        $this->user = User::find($userId);
        $response = Http::api($this->user->apiToken())->get('/journal');
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

            Http::api($this->user->apiToken())->post('/journal', [
                'code' => $this->lastRecordCode
            ]);

            return null;
        }

        if ($currentRecord['CODE'] !== $this->lastRecordCode) {
            $this->lastRecordCode = $currentRecord['CODE'];

            Http::api($this->user->apiToken())->post('/journal', [
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
                'auth_user' => $this->user->uniserver_name,
                'auth_password' => $this->user->uniserver_password,
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
