<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;


class PerfilAprovado extends Notification
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

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = route('home-2');

        return (new MailMessage)
                    ->subject($this->detalhes['simples'])
                    ->greeting($this->detalhes['saudacao'])
                    ->line($this->detalhes['corpo-email'])
                    ->action('Visite-nos', $url)
                    ->line($this->detalhes['agradecimento']);
    }


    public function toDatabase ($notifiable)
    {
        return [
            'data' => $this->detalhes['simples']
        ];
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
