<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SeminarRequestApprove extends Notification
{
    use Queueable;
    private $student;

    
    public function __construct($student)
    {
        $this->student=$student;
    }

    
    public function via($notifiable)
    {
        return ['mail'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your request is approved')
            ->greeting('Hello! '.$this->student->name)
            ->line('You are eligible for this seminar')
            ->line('To view the information click view button')
            ->action('View', url('admin/student'))
            ->line('Thank you for using our service!');
    }

    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
