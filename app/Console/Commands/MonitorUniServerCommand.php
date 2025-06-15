<?php

namespace App\Console\Commands;

use App\Services\TelegramService;
use App\Services\UniServerService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;

class MonitorUniServerCommand extends Command implements Isolatable
{
    protected $signature = 'monitor:uniserver {--user=}';

    protected $description = 'Monitor UniServer API for new records';

    public function handle(): void
    {
        $userId = $this->option('user');

        $uniServer = new UniServerService($userId);
        $telegram = new TelegramService($userId);

        $this->info("Starting UniServer monitoring for user {$userId}...");

        while (true) {
            $newRecord = $uniServer->checkForNewRecords();
            if ($newRecord) {
                $message = $telegram->formatRecordMessage($newRecord);
                $telegram->sendNotification($message);
                $this->info('New record detected and notification sent!');
            }

            sleep(5); // Проверяем каждые 5 секунд
        }
    }
}
