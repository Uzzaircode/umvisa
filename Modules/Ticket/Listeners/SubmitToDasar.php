<?php

namespace Modules\Ticket\Listeners;

use Modules\Ticket\Events\DasarEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class submitToDasar
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
     * @param DasarEvents $event
     * @return void
     */
    public function handle(DasarEvents $event)
    {
        //
    }
}
