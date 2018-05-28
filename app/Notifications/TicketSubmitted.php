<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;
use Illuminate\Http\Request;
use Modules\Ticket\Entities\Ticket;

class TicketSubmitted extends Notification
{
    use Queueable;
    public $ticket;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        // $this->user = $user;
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
                    ->line($this->ticket->user->name." has submitted a new ticket and would like you to review it")
                    ->Subject("Subject: ". $this->ticket->subject)                    
                    ->line("<hr>")
                    ->line("Created At: ". $this->ticket->created_at->toDayDateTimeString())
                    ->line("Department: ". $this->ticket->department->name)                
                    ->line("SAP Module: ". $this->ticket->sap->name);
                    if($this->ticket->integration != NULL){
                    $mailMessage->line("Integration: Yes");
                    $mailMessage->line("Application: ". $this->ticket->application->name);
                    }
        return $mailMessage;
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    // public function toArray($notifiable)
    // {
    //     return [
            
    //     ];
    // }

    public function toDatabase($notifiable){
        return [
            'message' => 'hello',
            'ticket_id' => $this->ticket->id,
            // 'sender_id' => $this->sender_id
        ];
    }
}
