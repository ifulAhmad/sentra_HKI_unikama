<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicantSubmissionCreate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private $data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Pemberitahuan Pengajuan',
            'body' => 'Pemohon melakukan pengajuan dengan judul <strong>' . $this->data->judul . '</strong>, yang beranggotakan <strong>' . $this->data->applicants->count() . '</strong> orang.',
            'link' => route('admin.submission.detail', $this->data->uuid),
        ];
    }
}
