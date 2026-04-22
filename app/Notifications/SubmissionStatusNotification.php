<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SubmissionStatusNotification extends Notification
{
    use Queueable;

    public $submission;
    public $status;

    public function __construct($submission, $status)
    {
        $this->submission = $submission;
        $this->status = $status;
    }

    public function via($notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Your file '{$this->submission->title}' was {$this->status}",
            'status' => $this->status,
            'submission_id' => $this->submission->id ?? null,
        ];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Submission Status Update')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Your submission has been reviewed.')
            ->line('Current Status: ' . strtoupper($this->status))
            ->action('View Dashboard', url('/dashboard'))
            ->line('Thank you for using our system!');
    }

    public function toArray($notifiable): array
    {
        return [
            'submission_id' => $this->submission->id ?? null,
            'status' => $this->status,
            'message' => "Your file '{$this->submission->title}' was {$this->status}",
        ];
    }
}