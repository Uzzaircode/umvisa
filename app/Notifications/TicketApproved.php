<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use Modules\Ticket\Entities\TicketStatusCheck;
use Illuminate\Http\Request;
use Modules\Ticket\Entities\Ticket;

class TicketApproved extends Notification
{
    use Queueable;
    public $ticket;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket, User $user)
    {
        $this->user = $user;
        $this->ticket = $ticket;        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mailMessage = new MailMessage();
        $mailMessage
                    ->from($this->user->email)
                    ->greeting("Hello there, ". $this->user->name ." has Approved your ticket")
                    
                    ->subject("Subject: ". $this->ticket->subject)
                    ->line("Ticket #: ". $this->ticket->ticket_number)       
                    ->line("Status: ")
                    ->line("Subject: ". $this->ticket->subject)
                    ->line("Created By: ". $this->ticket->user->name)
                    ->line("Created At: ". $this->ticket->created_at->toDayDateTimeString())
                    ->line("Department: ". $this->ticket->department->name)
                    ->line("SAP Module: ". $this->ticket->sap->name)
                    ->line("Type: ". ucwords($this->ticket->ticket_type));
        if ($this->ticket->integration != null) {
            $mailMessage->line("Integration: Yes");
            $mailMessage->line("Application: ". $this->ticket->application->name);
        }
        $mailMessage->line("Issue:");
        $mailMessage->line($this->ticket->body);
        if ($this->ticket->attachments->count() > 0) {
            $mailMessage->line("There are attachments included with this ticket, please view it in the system.");
        }
        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Your ticket has been approved - '. $this->ticket->ticket_number,
            'ticket_id' => $this->ticket->id,
        ];
    }
}
