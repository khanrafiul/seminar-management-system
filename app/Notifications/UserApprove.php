<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserApprove extends Notification
{
    use Queueable;
    private $users;
    
    public function __construct($users)
    {
        $this->users=$users;
    }

    
    public function via($notifiable)
    {
        return ['mail'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your request is approved')
            ->greeting('Hello! '.$this->users->name)
            ->line('Your requrst has been approved')
            ->line('To view the information click view button')
            ->action('View', url('admin/user'))
            ->line('Thank you for using our service!');
    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
