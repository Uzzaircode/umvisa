<?php
namespace Modules\Ticket\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Auth;
use Modules\Ticket\Repositories\TicketRepoInterface;
use Modules\Ticket\Entities\TicketStatus as TS;

class TicketsRepository extends AbstractRepository implements TicketRepoInterface
{
    protected $modelClassName = 'Modules\Ticket\Entities\Ticket';

    public function __construct(TS $status, Auth $auth)
    {
        $this->status = $status;
        $this->auth = $auth;
    }

    public function isAdmin()
    {
        return $this->auth::user()->hasRole('Admin');
    }
    public function isHOD()
    {
        return $this->auth::user()->hasRole('HOD');
    }
    public function HODId()
    {
        return $this->auth::user()->profile->department->id;
    }
    public function isDasar()
    {
        return $this->auth::user()->hasRole('Dasar');
    }
    public function isPTM()
    {
        return $this->auth::user()->hasRole('PTM');
    }
    public function isBrillante()
    {
        return $this->auth::user()->hasRole('Brillante');
    }

    public function allTickets()
    {
        // if user is admin, admin can see all tickets
        if ($this->isAdmin()) {
            return $this->modelClassName::orderBy('updated_at', 'desc')->get();
        } //if user is HOD
        elseif ($this->isHOD()) {
            // HOD can see ticket with submmited, approved and rejected status
            return $this->modelClassName::where('dept_id', $this->HODId())->whereIn('status', [2,3,4,5,6,7,8,9,10,11])->orderBy('updated_at', 'desc')->get();
        } //if user is normal user, normal user can only see his tickets
        elseif ($this->isDasar()) {
            // HOD can see ticket with submmited, approved and rejected status
            return $this->modelClassName::whereIn('status', [ 4,5,6,7,8,9,10])->orderBy('updated_at', 'desc')->get();
        } elseif ($this->isPTM()) {
            // HOD can see ticket with submmited, approved and rejected status
            return $this->modelClassName::whereIn('status', [ 8, 9,10,13])->orderBy('updated_at', 'desc')->get();
        } elseif ($this->isBrillante()) {
            // HOD can see ticket with submmited, approved and rejected status
            return $this->modelClassName::whereIn('status', [99])->orderBy('updated_at', 'desc')->get();
        } else {
            return $this->modelClassName::where('user_id', $this->auth::id())->orderBy('updated_at', 'desc')->get();
        }
    }
    
    // Generate ticket running numbers
    public function ticketNumber()
    {
        $lastTicket = $this->modelClassName::orderBy('id', 'desc')->first();
        if (!$lastTicket) {
            $number = 0;
        } else {
            $number = substr($lastTicket->ticket_number, 10);
        }
        return sprintf('%03d', intval($number) + 1);
    }

    public function ticketNumberFormat($sap_code, $ticket_rn)
    {
        return 'UM' . date('Y') . '-' . $sap_code . '-' . $ticket_rn;
    }
    
    public function draft($ticket)
    {
        $ticket->status = $this->status::DRAFT;
        $ticket->save();
    }
    // Save HOD approve timestamp and status
    public function submit_to_hod($ticket)
    {
        $ticket->status = $this->status::SUBMITTED_TO_HOD;
        $ticket->submitted_hod_date = time();
        $ticket->save();
    }
    // Save HOD approve and Submit To Dasar timestamp and status
    public function approve_hod($ticket)
    {
        $ticket->status = $this->status::SUBMITTED_TO_DASAR;
        $ticket->approved_hod_date = time();
        $ticket->submitted_dasar_date = time();
        $ticket->save();
    }
    // Save HOD reject timestamp and status
    public function reject_hod($ticket)
    {
        $ticket->status = $this->status::REJECTED_BY_HOD;
        $ticket->rejected_hod_date = time();
        $ticket->submitted_hod_date = null;
        $ticket->readby_hod_date = null;
        $ticket->save();
    }
    public function submit_to_dasar($ticket)
    {
        $ticket->status = $this->status::SUBMITTED_TO_DASAR;
        $ticket->submitted_dasar_date = time();
        $ticket->save();
    }
    // Save Dasar approve timestamp and status
    public function approve_dasar($ticket)
    {
        $ticket->status = $this->status::SUBMITTED_TO_PTM;
        $ticket->approved_dasar_date = time();
        $ticket->submitted_ptm_date = time();
        $ticket->save();
    }
    // Save HOD reject timestamp and status
    public function reject_dasar($ticket)
    {
        $ticket->status = $this->status::REJECTED_BY_DASAR;
        $ticket->rejected_dasar_date = time();
        $ticket->submitted_hod_date = null;
        $ticket->approved_hod_date = null;
        $ticket->readby_hod_date = null;
        $ticket->submitted_dasar_date = null;
        $ticket->readby_dasar_date = null;
        $ticket->save();
    }
    public function submit_to_ptm($ticket)
    {
        $ticket->status = $this->status::SUBMITTED_TO_PTM;
        $ticket->submitted_ptm_date = time();
        $ticket->save();
    }
    // Save PTM approve timestamp and status
    public function approve_ptm($ticket)
    {
        $ticket->status = $this->status::APPROVED_BY_PTM;
        $ticket->approved_ptm_date = time();
        $ticket->save();
    }
    // Save PTM reject timestamp and status
    public function reject_ptm($ticket)
    {
        $ticket->status = $this->status::REJECTED_BY_PTM;
        $ticket->rejected_ptm_date = time();
        $ticket->submitted_hod_date = null;
        $ticket->approved_hod_date = null;
        $ticket->readby_hod_date = null;
        $ticket->submitted_dasar_date = null;
        $ticket->readby_dasar_date = null;
        $ticket->approved_dasar_date = null;
        $ticket->submitted_ptm_date = null;
        $ticket->readby_ptm_date = null;
        $ticket->save();
    }
    // Save HOD read ticket record timestamp
    public function readby_hod($ticket)
    {
        // if($ticket->readby_hod_date == NULL){
        $ticket->status = $this->status::READ_BY_HOD;
        $ticket->readby_hod_date = time();
        $ticket->save();
        // }
    }
    // Save Dasar read ticket record timestamp
    public function readby_dasar($ticket)
    {
        if ($ticket->readby_dasar_date == null) {
            $ticket->status = $this->status::READ_BY_DASAR;
            $ticket->readby_dasar_date = time();
            $ticket->save();
        }
    }
    // Save PTM read ticket record timestamp
    public function readby_ptm($ticket)
    {
        if ($ticket->readby_ptm_date == null) {
            $ticket->status = $this->status::READ_BY_PTM;
            $ticket->readby_ptm_date = time();
            $ticket->save();
        }
    }

    public function assign_ticket($ticket)
    {
        if ($ticket->assigned_date == null) {
            $ticket->status = $this->status::ASSIGNED;
            $ticket->assigned_date = time();
            $ticket->save();
        }
    }
}
