<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ContactMessageNotification extends Notification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Ada yang menghubungi dari portofolio kamu!')
            ->greeting('Hai!')
            ->line('Ada yang menghubungi kamu dari portfolio-mu:')
            ->line('**Dari:** ' . $this->data['name'] . ' (' . $this->data['email'] . ')')
            ->line('**Pesan:**')
            ->line($this->data['message'])
            ->salutation('Salam, Website Portfolio Otomatis');
    }
}
