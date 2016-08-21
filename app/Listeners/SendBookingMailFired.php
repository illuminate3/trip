<?php

namespace App\Listeners;

use App\User;
use App\Events\SendBookingMail;
use Illuminate\Support\Facades\Mail;


class SendBookingMailFired
{
    protected $mail;

    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }
    /**
     * Handle the event.
     *
     * @param  SendBookingMail $event
     *
     * @return void
     */
    public function handle(SendBookingMail $event)
    {
        $user = User::find($event->userId);
        $this->mail->send('email.booking', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Your Booking!');
        });
    }
}
