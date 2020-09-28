<?php

namespace App\Listeners;

use App\Events\ConfirmedRobo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Robo;

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
        if ($robo != null) {
        }

    }
}
