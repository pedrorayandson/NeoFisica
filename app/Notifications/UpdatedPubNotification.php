<?php

namespace App\Notifications;

use App\Models\Publicacao;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class UpdatedPubNotification extends Notification
{
    use Queueable;
    public $publicacao;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Publicacao $publicacao)
    {
        $this->publicacao = $publicacao;
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
        $tit = str_replace(" ", "_", $this->publicacao->pub_titulo);
        return (new MailMessage)
                    ->line('o conteudo/noticia " '.$this->publicacao->pub_titulo.'" foi editado')
                    ->action('Ver', url("/publicacoes/$tit"))
                    ->line('Thank you for using our application!');
    
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
