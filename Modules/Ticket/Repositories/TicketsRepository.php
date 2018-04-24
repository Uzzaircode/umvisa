<?php 
namespace Modules\Ticket\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Modules\Ticket\Repositories\TicketRepoInterface;
use Auth;

class TicketsRepository extends AbstractRepository implements TicketRepoInterface
{
	protected $modelClassName = 'Modules\Ticket\Entities\Ticket';
	
	public function allTickets(){
				
		if(!(Auth::user()->hasRole('Admin'))){
        	return $this->modelClassName::all()->where('user_id',Auth::id());
        }else{
			return $this->modelClassName::all();
		}
	}
	public function ticketNumber(){
		$lastTicket = $this->modelClassName::orderBy('id', 'desc')->first();
        if(!$lastTicket ){        
            $number = 0;
        }else{ 
            $number = substr($lastTicket->ticket_number,2);            
		}
		return 'UM' . sprintf('%08d', intval($number) + 1);
	}
}