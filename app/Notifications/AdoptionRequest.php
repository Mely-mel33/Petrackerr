<?php

namespace App\Notifications;
use App\Models\Pet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdoptionRequest extends Notification
{
    use Queueable;
    protected $pet;
    protected $adopter;

    /**
     * Create a new notification instance.
     */
    public function __construct(Pet $pet, $adopter)
    {
        //
        $this->pet = $pet;
        $this->adopter = $adopter;
    }

    /**
     * Get the notification's delivery channels.
     *
     *
     */
    public function via( $notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
   /* public function toMail(object $notifiable): MailMessage
     {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }*/

    /**
     * Get the array representation of the notification.
     *
     
     */
    public function toArray( $notifiable)
    {
        return [
            'pet_id' => $this->pet->id,
            'pet_name' => $this->pet->name,
            'adopter_id' => $this->adopter->id,
            'adopter_name' => $this->adopter->name,
            'message' => "Une nouvelle demande d'adoption pour votre animal " . $this->pet->name,
        ];
    }
}
