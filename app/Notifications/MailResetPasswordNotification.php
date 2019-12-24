<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MailResetPasswordNotification extends Notification
{
    use Queueable;
    private $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $link = url( "/password/reset/?token=" . $this->token );

        return ( new MailMessage ) 
            ->from('noreply.flximoveis@gmail.com','FLX IMÓVEIS')
            ->greeting('Olá!')
            ->subject( 'Redefinir sua senha - FLX' )
            ->line( "Você está recebendo este e-mail para resetar sua senha no portal flximoveis.com.br! Clique no botão abaixo para escolher sua nova senha. " )
            ->action( 'RESETAR SENHA', $link ) 
            ->line( 'Este e-mail tem validade de 60 minutos.' )
            ->salutation('Atenciosamente Equipe FLX IMÒVEIS');
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
