<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubmissionRevisiFromAdmin extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $data;
    public function __construct($data)
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
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->subject('Pemberitahuan Revisi')
    //         ->line('Revisi cok.')
    //         ->line($this->data)
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Pemberitahuan Revisi',
            'body' => 'Izin revisi diberikan untuk pengajuan ' . $this->data->judul,
            'link' => route('progress.detail', $this->data->uuid),
        ];
    }
}
