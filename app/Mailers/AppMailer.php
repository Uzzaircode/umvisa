<?php 

namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use Modules\Ticket\Entities\Ticket;

class AppMailer {

    protected $mailer; 
    protected $fromAddress = 'support@supportticket.dev';
    protected $fromName = 'Support Ticket';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->to = '2d8b1b547b-47c470@inbox.mailtrap.io';
        $this->subject = "Ticket #: $ticket->ticket_number $ticket->subject";
        $this->view = 'emails.mail';
        $this->data = compact('user', 'ticket');

        return $this->deliver();
    }

    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function($message) {
            $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
        });
    }

}