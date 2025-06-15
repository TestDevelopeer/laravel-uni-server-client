<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Services\ProfileService;
use App\Services\TelegramService;
use App\Services\UniServerService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Illuminate\Http\Client\ConnectionException;

class MonitorUniServerCommand extends Command implements Isolatable
{
    protected $signature = 'monitor:uniserver {--user=}';

    protected $description = 'Monitor UniServer API for new records';

    /**
     * @throws ConnectionException
     */
    public function handle(): void
    {
        $userId = $this->option('user');

        $this->info("Получение информации о пользователе #$userId...");

        $user = User::find($userId);

        if ($user) {
            $token = $user->apiToken();

            $profileService = new ProfileService($token);

            $response = $profileService->getProfileInfo();

            if ($response->successful()) {
                $this->info("Информация о пользователе #$userId получена!");

                $data = $response->json();

                $user = $data['user'];
                $user['uniserver_user'] = $data['uniserver_user'];
                $user['telegram'] = $data['telegram'];

                if ($user['uniserver_user'] === [] || $user['uniserver_user']['name'] === null || $user['uniserver_user']['password'] === null) {
                    $this->error("Аккаунт Uniserver не закреплен за пользователем #$userId. Обратитесь к администратору!");
                    return;
                }

                if ($user['telegram'] === [] || $user['telegram']['chat_id'] === null) {
                    $this->error("Аккаунт Telegram не закреплен за пользователем #$userId. Обратитесь к администратору!");
                    return;
                }


                $this->info("Начинаю мониторинг UniServer для пользователя #$userId...");

                $uniServerService = new UniServerService($token, $user['uniserver_user']);
                $uniServerService->setLastRecordCode();

                $telegramService = new TelegramService($token);

                while (true) {
                    $newRecord = $uniServerService->checkForNewRecords();
                    if ($newRecord) {
                        $message = $telegramService->formatRecordMessage($newRecord);
                        $telegramService->sendNotification($message);
                        $this->newLine();
                        $this->info("Найдена новая запись в журнале с кодом: {$newRecord['CODE']}! Уведомление отправлено в Telegram!");
                        $this->newLine();
                        $this->info("Продолжаю мониторинг UniServer для пользователя #$userId...");
                    }

                    sleep(5); // Проверяем каждые 5 секунд
                }
            } else {
                $this->error("Не удалось получить информацию о пользователе #$userId. Обратитесь к администратору!");
            }
        }
    }
}
