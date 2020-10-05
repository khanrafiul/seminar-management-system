<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistration extends Notification
{
    use Queueable;
    private $create;
    
    public function __construct($create)
    {
        $this->create=$create;
    }

    
    public function via($notifiable)
    {
        return ['mail'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello, Admin!')
            ->subject('New registration approval needed')
            ->line('New registration by '.$this->create->name.' need to approve')
            ->line('To approve the request click view button')
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
