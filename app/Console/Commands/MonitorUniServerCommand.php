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
    protected $signature = 'monitor:uniserver';

    protected $description = 'Monitor UniServer API for new records';

    public function handle(Request $request): void
    {
        $uniServer = new UniServerService();
        $telegram = new TelegramService();

        $this->info('Starting UniServer monitoring...');

        while (true) {
            $newRecord = $uniServer->checkForNewRecords();
            var_dump($request->user());
            if ($newRecord) {
                $chatId = TelegramSetting::where('user_id', Auth::id())->select('chat_id')->first();

                $message = $telegram->formatRecordMessage($newRecord);
                $telegram->sendNotification($message, $chatId);

                var_dump($newRecord['DOCUMENT_NUMBER']);
                $this->info('New record detected and notification sent!');
            }

            sleep(5); // Проверяем каждые 5 секунд
        }
    }
}
