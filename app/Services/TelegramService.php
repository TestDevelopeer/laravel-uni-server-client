<?php

namespace App\Services;

use GuzzleHttp\Client;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\HttpClients\GuzzleHttpClient;

class TelegramService
{
    protected Api $telegram;

    /**
     * @throws TelegramSDKException
     */
    public function __construct()
    {
        if(app()->environment('local')) {
            $this->telegram = new Api(config('telegram.bots.mybot.token'), false, new GuzzleHttpClient(new Client([
                'verify' => false,
            ])));
        } else {
            $this->telegram = new Api(config('telegram.bots.mybot.token'));
        }
    }

    /**
     * @throws TelegramSDKException
     */
    public function sendNotification($message, $chatId)
    {
        $this->telegram->sendMessage([
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }

    public function formatRecordMessage(array $record)
    {
        $message = "<b>Новая запись в журнале взвешиваний</b>\n";
        $message .= "--------------------------------\n";
        $message .= "<b>Номер документа:</b> {$record['DOCUMENT_NUMBER']}\n";
        $message .= "<b>Дата/время:</b> {$record['WEIGHING_DATETIME']}\n";
        $message .= "<b>Тип взвешивания:</b> {$record['TYPWEIGHINGCAPTION']}\n";
        $message .= "<b>Транспорт:</b> {$record['FULL_NUMB_TS']}\n";
        $message .= "<b>Прицеп:</b> {$record['FULL_NUMB_TRAILER']}\n";
        $message .= "<b>Груз:</b> {$record['CARGO_NAME']}\n";
        $message .= "<b>Отправитель:</b> {$record['SENDER_NAME']}\n";
        $message .= "<b>Получатель:</b> {$record['RECEIVER_NAME']}\n";
        $message .= "<b>Брутто:</b> {$record['BRUTTO']} {$record['UNITMEAS']}\n";
        $message .= "<b>Тара:</b> {$record['TARA']} {$record['UNITMEAS']}\n";
        $message .= "<b>Нетто:</b> {$record['NETTO']} {$record['UNITMEAS']}\n";
        $message .= "<b>Весы:</b> {$record['SCALE_NAME']}\n";

        return $message;
    }
}
