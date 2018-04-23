<?php 
namespace Modules\Ticket\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Modules\Ticket\Repositories\TicketRepoInterface;


class TicketsRepository extends AbstractRepository implements TicketRepoInterface
{
	protected $modelClassName = 'Modules\Ticket\Entities\Ticket';
	
	// public function create($request){
	// 	return $modelClassName::create([
	// 		'user_id' => $request->user_id,
	// 		'subject' => $request->subject,
	// 		'body' => $request->body,
	// 		'sap_id' => $request->sap_id
	// 	]);
	// }
}