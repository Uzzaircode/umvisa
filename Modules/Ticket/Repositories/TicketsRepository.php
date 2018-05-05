<?php
namespace Modules\Ticket\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Auth;
use Modules\Department\Entities\Department;
use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Repositories\TicketRepoInterface;

class TicketsRepository extends AbstractRepository implements TicketRepoInterface
{
    protected $modelClassName = 'Modules\Ticket\Entities\Ticket';

    public function allTickets()
    {
        // if user is admin, admin can see all tickets
        if (Auth::user()->hasRole('Admin')) {
            return $this->modelClassName::orderBy('created_at', 'desc')->get();
        } //if user is HOD
        elseif (Auth::user()->hasRole('HOD')) {
            $user = Auth::user();
            $dept_id = $user->profile->department->id;
            // HOD can see ticket with submmited, approved and rejected status
            return $this->modelClassName::where('dept_id', $dept_id)->where('status', 2)->orWhere('status', 3)->orWhere('status', 11)->orderBy('updated_at', 'desc')->get();
        } //if user is normal user, normal user can only see his tickets
        elseif (Auth::user()->hasRole('Dasar')) {
            $user = Auth::user();
            // HOD can see ticket with submmited, approved and rejected status
            return $this->modelClassName::where('status', 2)->orWhere('status', 3)->orWhere('status', 12)->orderBy('updated_at', 'desc')->get();
        } else {
            return $this->modelClassName::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
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

	// Save HOD approve timestamp and status
    public function approve_hod($ticket)
    {
        $ticket->status = 3;
        $ticket->approved_hod_date = time();
        $ticket->save();
    }
	// Save HOD reject timestamp and status
    public function reject_hod($ticket)
    {
        $ticket->status = 4;
        $ticket->rejected_hod_date = time();
        $ticket->save();
	}
	// Save Dasar approve timestamp and status
    public function approve_dasar($ticket)
    {
        $ticket->status = 6;
        $ticket->approved_dasar_date = time();
        $ticket->save();
    }
	// Save HOD reject timestamp and status
    public function reject_dasar($ticket)
    {
        $ticket->status = 7;
        $ticket->rejected_dasar_date = time();
        $ticket->save();
	}
	// Save PTM approve timestamp and status
    public function approve_ptm($ticket)
    {
        $ticket->status = 9;
        $ticket->approved_ptm_date = time();
        $ticket->save();
    }
	// Save PTM reject timestamp and status
    public function reject_ptm($ticket)
    {
        $ticket->status = 10;
        $ticket->rejected_ptm_date = time();
        $ticket->save();
	}
	// Save HOD read ticket record timestamp
    public function readby_hod($ticket)
    {   $ticket->status = 11;
        $ticket->readby_hod_date = time();
        $ticket->save();
	}
	// Save Dasar read ticket record timestamp
    public function readby_dasar($ticket)
    {   $ticket->status = 12;
        $ticket->readby_dasar_date = time();
        $ticket->save();
	}
	// Save PTM read ticket record timestamp
    public function readby_ptm($ticket)
    {   $ticket->status = 13;
        $ticket->readby_ptm_date = time();
        $ticket->save();
    }
}
