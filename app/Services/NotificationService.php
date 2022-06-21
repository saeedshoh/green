<?php

namespace App\Services;


class NotificationService
{
    public function sendSms($phone, $code)
    {
        // $basic  = new \Vonage\Client\Credentials\Basic("0cf3b534", "5Gdv7qWLUOuktEdj");
        // $client = new \Vonage\Client($basic);

        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS("992".$phone, 'CheckIn', 'Код для подтверждения: '.$code)
        // );

        // $message = $response->current();

        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }


    }
}
