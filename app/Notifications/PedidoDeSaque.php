<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PedidoDeSaque extends Notification
{
    use Queueable;
    private $detalhes;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
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
            'url_id' => $this->detalhes['transacao_id']
        ];
    }
}
