<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Reporte;
use User;

class CerrarReporte extends Notification
{
    use Queueable;

    public function __construct(Reporte $reporte, User $admin)
    {
        //
        $this->reporte = $reporte;
        $this->admin = $admin;
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
          'data' => __('web.reporte.cerroreporte', ['user' => $this->admin->name, 'numero' => $this->reporte->id]),
          'redire' => route('reporte.show', ['id' => $this->reporte->id]),
      ];
    }
}
