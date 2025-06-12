<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class TelegramService
{
    protected $user;

    public function __construct($userId)
    {
        $this->user = User::find($userId);
    }

    public function sendNotification($message): void
    {
        $response = Http::api($this->user->apiToken())->post('/telegram/send/message', [
            'message' => $message,
        ]);
    }

    public function formatRecordMessage(array $record): string
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
