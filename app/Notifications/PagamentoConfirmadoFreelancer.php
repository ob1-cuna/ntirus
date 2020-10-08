<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PagamentoConfirmadoFreelancer extends Notification
{
    use Queueable;
    private $detalhes;

    public function __construct($detalhes)
    {
        $this->detalhes = $detalhes;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        $url = route('dashboard.invoices.show', ['transacao' => $this->detalhes['transacao_id']]);

        return (new MailMessage)
            ->subject($this->detalhes['simples'])
            ->greeting($this->detalhes['saudacao'])
            ->line($this->detalhes['corpo-email'])
            ->action('Veja o extracto', $url)
            ->line($this->detalhes['agradecimento']);
    }

    public function toDatabase($notifiable)
    {
        return [
            'data' => $this->detalhes['simples'],
            'url_id' => $this->detalhes['transacao_id']
        ];
    }
}
