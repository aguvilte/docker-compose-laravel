<?php

namespace App\Listeners;

use App\Events\EventAlertRobo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AlertRobo
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
     * @param  EventAlertRobo  $event
     * @return void
     */
    public function handle(EventAlertRobo $event)
    {
        //
    }
}
