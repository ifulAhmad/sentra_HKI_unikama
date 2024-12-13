<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RequestFromUserForClaimApplicantData extends Notification
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
            'title' => 'Pengajuan Klaim Data Pemohon',
            'body' => '<strong>' . $this->data->user->nama . ' memohon untuk mengklaim sebuah data pemoghon dengan NIK <strong>' . $this->data->applicant->nik . '</strong>',
            'link' => route('admin.claim.detail', $this->data->uuid)
        ];
    }
}
