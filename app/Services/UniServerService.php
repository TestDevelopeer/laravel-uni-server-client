<?php

namespace App\Services;

use App\Models\Journal;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UniServerService
{
    public function __construct()
    {
    }

    public function checkForNewRecords()
    {
        $currentRecord = $this->getLastRecord();

        if (!$currentRecord) {
            return null;
        }

        $lasRecord = Journal::first();

        if (!$lasRecord) {
            Journal::create([
                'identification' => $currentRecord['ID'],
                'code' => $currentRecord['CODE'],
            ]);

            return null;
        }

        if ($currentRecord['ID'] !== $lasRecord['identification']) {
            $lasRecord['identification'] = $currentRecord['ID'];
            $lasRecord['code'] = $currentRecord['CODE'];
            $lasRecord->save();
            $lasRecord->fresh();

            return $currentRecord;
        }

        return null;
    }

    public function getLastRecord()
    {
        try {
            $response = Http::uniserver()->get("/SendMsg", [
                'Name' => 'AutoScaleJournal1_GetRecords',
                'Value' => json_encode(['Filter' => [], 'MaxRows' => 1], JSON_THROW_ON_ERROR),
                'auth_user' => Auth::user()->uniserver_name,
                'auth_password' => Auth::user()->uniserver_password,
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
