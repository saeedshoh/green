<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\AndroidConfig;
use NotificationChannels\Fcm\Resources\AndroidFcmOptions;
use NotificationChannels\Fcm\Resources\AndroidNotification;
use NotificationChannels\Fcm\Resources\ApnsConfig;
use NotificationChannels\Fcm\Resources\ApnsFcmOptions;

class ConnectScannNotification extends Notification
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function via($notifiable)
    {
        return [FcmChannel::class, 'database'];
    }

    public function toFcm($notifiable)
    {
        dd($this->data['img_path']);
        return FcmMessage::create()
            ->setData(['data1' => 'value', 'data2' => 'value2'])
            ->setNotification(\NotificationChannels\Fcm\Resources\Notification::create()
                ->setTitle($this->data['title'])
                ->setBody($this->data['message'])
                ->setImage($this->data['img_path']))
            ->setAndroid(
                AndroidConfig::create()
                    ->setFcmOptions(AndroidFcmOptions::create()->setAnalyticsLabel('analytics'))
                    ->setNotification(AndroidNotification::create()->setColor('#FF7A00'))
            )->setApns(
                ApnsConfig::create()
                    ->setFcmOptions(ApnsFcmOptions::create()->setAnalyticsLabel('analytics_ios'))
            );
    }

    // optional method when using kreait/laravel-firebase:^3.0, this method can be omitted, defaults to the default project
    public function fcmProject($notifiable, $message)
    {
        // $message is what is returned by `toFcm`
        return 'app'; // name of the firebase project to use
    }


    /**
     * Получить массив данных уведомления.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user'      => $notifiable->name,
            'avatar'    => $notifiable->avatar,
            'title'     => $this->data['title'],
            'message'   => $this->data['message'],
            'img_path'  => $this->data['img_path'],
        ];
    }
}
