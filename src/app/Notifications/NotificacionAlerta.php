<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use App\Models\MovimientoPatente;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class NotificacionAlerta extends Notification implements ShouldQueue
{
    use Queueable;

    protected $movimiento;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(MovimientoPatente $movimiento)
    {
        $this->movimiento = $movimiento;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast', WebPushChannel::class];
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
            'id_patente' => $this->movimiento->patente->id,
            'numero_patente' => $this->movimiento->patente->numero,
            'modelo_patente' => $this->movimiento->patente->modelo,
            'precision' => $this->movimiento->precision,
            'fecha' => Carbon::now()->format('d-m-yy H:i:s')
        ];
    }
    public function toWebPush($notifiable, $notification)
    {
        return (new WebPushMessage)
            ->title('Alerta Detección')
            ->icon(asset('/public/img/logo.png'))
            ->body('Una patente fue detectada por las cámara')
            ->action('View App', 'notification_action')
            ->image(asset('public/img/logo.png'))
            ->options(['TTL' => 1000]);
    }
}
