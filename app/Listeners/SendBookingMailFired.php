<?php

namespace App\Listeners;

use Mail;
use App\Events\SendBookingMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
class SendBookingMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendBookingMail  $event
     * @return void
     */
    public function handle(SendBookingMail $event)
    {
        $user = User::find($event->userId);
        Mail::send('email.booking', [ 'user' => $user ], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Your Booking!');
        });
    }
}
