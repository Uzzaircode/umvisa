<?php

namespace Modules\Ticket\Events;

use Illuminate\Queue\SerializesModels;

class DasarEvents
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $ticket;

    public function __construct()
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
