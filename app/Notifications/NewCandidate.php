<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    private $id_vacancy;
    private $vacancy_name;
    private $user_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($id_vacancy, $vacancy_name, $user_id)
    {
        $this->id_vacancy = $id_vacancy;
        $this->vacancy_name = $vacancy_name;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/notifications');
        return (new MailMessage)
                    ->line('You have received a new candidate for the vacancy: ' . $this->vacancy_name)
                    ->action('See notification', $url)
                    ->line('Thank you for using DevJobs!');
    }

    /** Almacenar las notificaciones en la base de datos **/
    public function toDatabase(object $notifiable): array
    {
        return [
            'vacancy_id' => $this->id_vacancy,
            'vacancy_name' => $this->vacancy_name,
            'user_id' => $this->user_id,
        ];
    }

}
