<?php

namespace Modules\Ticket\Listeners;

use Modules\Ticket\Events\HODEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class submitToHOD
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
     * @param HODEvents $event
     * @return void
     */
    public function handle(HODEvents $event)
    {
        $event->status = 2;            
        $event->submitted_hod_date = time();
    }
}
