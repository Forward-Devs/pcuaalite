<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Reporte;
use Auth;

class CrearReporte extends Notification
{
    use Queueable;

    public function __construct(Reporte $reporte)
    {
        //
        $this->reporte = $reporte;
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
          'data' => __('web.reporte.adminreporte', ['user' => auth()->user()->name, 'reportado' => $this->reporte->reportado->name]),
          'redire' => route('reporte.show', ['id' => $this->reporte->id]),
      ];
    }
}
