<?php

namespace App\Notifications;
use Shout;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CrearShout extends Notification
{
  use Queueable;

  protected  $shout;
  public function __construct(Shout $shout)
  {
      $this->shout = $shout;
  }

  public function via($notifiable)
  {
      return ['database'];
  }


  public function toArray($notifiable)
  {
      return [
          'data' => __('web.envioshout', ['user' => auth()->user()->name, 'shout' => $this->shout->shout]),
          'redire' => url('user/'.auth()->user()->name),
      ];
  }
}
