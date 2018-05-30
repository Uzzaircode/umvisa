<?php

namespace Modules\Ticket\Entities;
use Modules\Ticket\Entities\TicketStatus as TS;

class TicketsStatusArray{

   public $date_arr;
   public function __construct(TS $status){
       $this->status = $status;
   }
   public function createDateArray($ticket){
      return  $this->date_arr = [
        [
            'status' => 'Created At',
            'timestamp' => $ticket->created_at->toDayDateTimeString(),
            'color' => 'orange',
            'code' => $this->status::DRAFT,            
        ],
        [
            'status' => 'Submitted to HOD',
            'timestamp' => $ticket->submitted_hod_date,
            'color' => 'green',
            'code' => $this->status::SUBMITTED_TO_HOD,
        ],
        [
            'status' => 'Read by HOD',
            'timestamp' => $ticket->readby_hod_date,
            'color' => 'green',
            'code' => $this->status::READ_BY_HOD,
        ],
        [
            'status' => 'Approved by HOD',
            'timestamp' => $ticket->approved_hod_date,
            'color' => 'blue',
            'code' => $this->status::APPROVED_BY_HOD,
        ],
        [
            'status' => 'Rejected by HOD',
            'timestamp' => $ticket->rejected_hod_date,
            'color' => 'red',
            'code' => $this->status::REJECTED_BY_HOD,
        ],
        [
            'status' => 'Submitted to  Dasar',
            'timestamp' => $ticket->submitted_dasar_date,
            'color' => 'green',
            'code' => $this->status::SUBMITTED_TO_DASAR,
        ],
        [
            'status' => 'Read by Dasar',
            'timestamp' => $ticket->readby_dasar_date,
            'color' => 'green',
            'code' => $this->status::READ_BY_DASAR,
        ],
        [
            'status' => 'Approved by Dasar',
            'timestamp' => $ticket->approved_dasar_date,
            'color' => 'blue',
            'code' => $this->status::APPROVED_BY_DASAR,
        ],
        [
            'status' => 'Rejected by Dasar',
            'timestamp' => $ticket->rejected_dasar_date,
            'color' => 'red',
            'code' => $this->status::REJECTED_BY_DASAR,
        ],
        [
            'status' => 'Submitted to PTM',
            'timestamp' => $ticket->submitted_ptm_date,
            'color' => 'green',
            'code' => $this->status::SUBMITTED_TO_PTM,
        ],
        [
            'status' => 'Read by PTM',
            'timestamp' => $ticket->readby_ptm_date,
            'color' => 'green',
            'code' => $this->status::READ_BY_PTM,
        ],
        [
            'status' => 'Approved by PTM',
            'timestamp' => $ticket->approved_ptm_date,
            'color' => 'blue',
            'code' => $this->status::APPROVED_BY_PTM,
        ],
        [
            'status' => 'Rejected by PTM',
            'timestamp' => $ticket->rejected_ptm_date,
            'color' => 'red',
            'code' => $this->status::REJECTED_BY_PTM,
        ],
        [
            'status' => 'Assigned to IT Staff',
            'timestamp' => $ticket->assigned_date->toDayDateTimeString(),
            'color' => 'blue',
            'code' => $this->status::ASSIGNED,
        ]
    ];
   }
  
}