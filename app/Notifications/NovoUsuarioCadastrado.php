<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class NovoUsuarioCadastrado extends Notification
{
    use Queueable;
    private $detalhes;

    public function __construct($detalhes)
    {
        $this->detalhes = $detalhes;
    }


    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'data' => $this->detalhes['simples'],
            'url_id' => $this->detalhes['user_id']
        ];
    }
}
