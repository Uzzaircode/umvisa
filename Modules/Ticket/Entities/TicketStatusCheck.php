<?php 

namespace Modules\Ticket\Entities;

class TicketStatusCheck{

    public $ticket;

    public function isSubmittedToHOD(){
        return $this->ticket == 2;
    }
}