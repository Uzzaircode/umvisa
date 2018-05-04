<?php

namespace Modules\Ticket\Listeners;

use Modules\Ticket\Events\PTMEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class submitToPTM
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
     * @param PTMEvents $event
     * @return void
     */
    public function handle(PTMEvents $event)
    {
        //
    }
}
