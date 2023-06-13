<?php

namespace App\Notifications;

use App\Models\m_f_l_s;
use App\Models\Referral;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReferralRequestSent extends Notification
{
    use Queueable;

    protected $referralId;
    public function __construct($referralId)
    {
        $this->referralId = $referralId;
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



    public function toDatabase(){

        $referral = Referral::find($this->referralId);
        $facility = m_f_l_s::where('Code', $referral->referring_facility_id)->first();
        $facility_name = $facility->Officialname;
        return [
            'data' => "referral request received",
            'from' => $facility->Code." - ".$facility_name,
            'referral_id' => $referral->id
        ];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'data' => "referral request received",
            'from' => "Coast General",
            'referral_id' => "3"
        ];
    }
}
