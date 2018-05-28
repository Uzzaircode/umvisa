<?php
namespace Modules\Ticket\Repositories;

use App\Abstracts\Repository as AbstractRepository;
use Modules\Ticket\Repositories\TicketRepoInterface;

class TicketsAttachmentRepository extends AbstractRepository implements TicketRepoInterface
{
    protected $modelClassName = 'Modules\Ticket\Entities\TicketAttachment';
    
}
