<?php

namespace App\Console\Commands;

use App\Models\TelegramSetting;
use App\Services\TelegramService;
use App\Services\UniServerService;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitorUniServerCommand extends Command
{
    protected $signature = 'monitor:uniserver {userId}';

    protected $description = 'Monitor UniServer API for new records';

    public function handle(Request $request): void
    {
        $userId = $this->argument('userId');

        $uniServer = new UniServerService($userId);
        $telegram = new TelegramService($userId);

        $this->info("Starting UniServer monitoring for user {$userId}...");

        while (true) {
            $newRecord = $uniServer->checkForNewRecords();
            var_dump($newRecord);
            if ($newRecord) {
                $message = $telegram->formatRecordMessage($newRecord);
                $telegram->sendNotification($message);
                $this->info('New record detected and notification sent!');
            }

            sleep(5); // Проверяем каждые 5 секунд
        }
    }
}
