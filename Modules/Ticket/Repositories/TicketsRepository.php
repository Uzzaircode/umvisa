<?php 
namespace Modules\Ticket\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Modules\Ticket\Repositories\TicketRepoInterface;
use Modules\Ticket\Entities\Ticket;
use Modules\Department\Entities\Department;
use Auth;

class TicketsRepository extends AbstractRepository implements TicketRepoInterface
{
	protected $modelClassName = 'Modules\Ticket\Entities\Ticket';

	public function allTickets(){
		// if user is admin, admin can see all tickets
		if(Auth::user()->hasRole('Admin')){
        	return $this->modelClassName::all()->sortByDesc('created_at');
		}//if user is HOD
		elseif(Auth::user()->hasRole('HOD')){
			$user = Auth::user();
			$dept_id = $user->profile->department->id;
			// HOD can see ticket with submmited, approved and rejected status
			return $this->modelClassName::where('dept_id',$dept_id)->where('status',2)->orWhere('status',3)->orderBy('updated_at','desc')->get();
		}//if user is normal user, normal user can only see his tickets
		else{
			return $this->modelClassName::where('user_id',Auth::id())->orderBy('updated_at','desc')->get();			
		}
	}
	
	// Generate ticket running numbers
	public function ticketNumber(){
		
		$lastTicket = $this->modelClassName::orderBy('id', 'desc')->first();
        if(!$lastTicket ){        
            $number = 0;
        }else{ 
            $number = substr($lastTicket->ticket_number,10);            
		}
		return sprintf('%03d', intval($number) + 1);
	}


	public function approve($ticket){		
		$ticket->status = 3;
		$ticket->save();
	}

	public function reject($ticket){		
		$ticket->status = 4;
		$ticket->save();
	}
}