<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Noticia;

class CrearNoticia extends Notification
{
  use Queueable;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
   protected $noticia;
  public function __construct(Noticia $noticia)
  {
      //
      $this->noticia = $noticia;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function via($notifiable)
  {
      return ['database'];
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
        'data' => 'Nueva Noticia: "'.$this->noticia->titulo_es.'"',
        'redire' => route('noticia', ['id' => $this->noticia->id]),
    ];
  }
}
