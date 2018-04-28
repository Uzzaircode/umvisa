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
				
		if(Auth::user()->hasRole('Admin')){
        	return $this->modelClassName::all();
		}elseif(Auth::user()->hasRole('HOD')){
			$user = Auth::user();
			$dept_id = $user->profile->department->id;
			return $this->modelClassName::all()->where('dept_id',$dept_id)->where('status',2);
		}else{
			return $this->modelClassName::all()->where('user_id',Auth::id());			
		}
	}
	
	public function ticketNumber(){
		$lastTicket = $this->modelClassName::orderBy('id', 'desc')->first();
        if(!$lastTicket ){        
            $number = 0;
        }else{ 
            $number = substr($lastTicket->ticket_number,10);            
		}
		return sprintf('%03d', intval($number) + 1);
	}

	public function approve($id){
		$ticket = $this->modelClassName::find($id);
		$ticket->status = 3;
		$ticket->save();
	}
}