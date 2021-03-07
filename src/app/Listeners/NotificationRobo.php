<?php

namespace App\Listeners;

use App\Events\ConfirmedRobo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Robo;
use App\User;
use Notification;
use App\Notifications\PushNotification;
use App\Notifications\NotificacionAlerta;

class NotificationRobo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ConfirmedRobo  $event
     * @return void
     */
    public function handle(ConfirmedRobo $event)
    {
        $numeropatente= $event->movimientoPatente->patente->numero;
        $robo = Robo::where('numero_patente',$numeropatente)->first();
        if ($robo != null && $robo->estado === Robo::ESTADO_ACTIVO) {
            $usuarios = User::all();
            Notification::send($usuarios,new NotificacionAlerta($event->movimientoPatente));
        }else{
            return ;
        }

    }
}
