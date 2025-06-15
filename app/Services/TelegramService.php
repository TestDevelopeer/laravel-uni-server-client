<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class TelegramService
{
    protected string $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @throws ConnectionException
     */
    public function sendNotification($message)
    {
        return Http::api($this->token)->post('/telegram/send/message', [
            'message' => $message,
        ]);
    }

    public function formatRecordMessage(array $record): string
    {
        $message = "<b>Новая запись в журнале взвешиваний</b>\n";
        $message .= "--------------------------------\n";
        $message .= "<b>Номер документа:</b> {$record['DOCUMENT_NUMBER']}\n";
        $message .= "<b>Дата/время создания записи:</b> {$record['DATETIME_CREATE']}\n";
        $message .= "--------------------------------\n";
        if ($record['TRUCKDRIVER']) {
            $message .= "<b>Водитель:</b> {$record['TRUCKDRIVER']}\n";
        }
        $message .= "<b>Тип ТС:</b> {$record['TS_TYP_NAME']}\n";
        $message .= "<b>Номер ТС:</b> {$record['FULL_NUMB_TS']}\n";
        if ($record['FULL_NUMB_TRAILER']) {
            $message .= "<b>Номер прицепа:</b> {$record['FULL_NUMB_TRAILER']}\n";
        }
        $message .= "--------------------------------\n";
        $message .= "<b>Тип взвешивания:</b> {$record['TYPWEIGHINGCAPTION']}\n";
        $message .= "<b>Брутто:</b> {$record['BRUTTO']} {$record['UNITMEAS']}\n";
        $message .= "<b>Тара:</b> {$record['TARA']} {$record['UNITMEAS']}\n";
        $message .= "<b>Нетто:</b> {$record['NETTO']} {$record['UNITMEAS']}\n";
        $message .= "<b>Весы:</b> {$record['SCALE_NAME']}\n";
        $message .= "--------------------------------\n";
        $message .= "<b>Груз:</b> {$record['CARGO_NAME']}\n";
        $message .= "<b>Отправитель:</b> {$record['SENDER_NAME']}\n";
        $message .= "<b>Получатель:</b> {$record['RECEIVER_NAME']}\n";
        if ($record['CARRIER_NAME']) {
            $message .= "<b>Перевозчик:</b> {$record['CARRIER_NAME']}\n";
        }

        return $message;
    }
}
