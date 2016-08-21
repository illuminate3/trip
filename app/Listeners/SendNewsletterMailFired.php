<?php

namespace App\Listeners;

use App\Events\SendNewsletterMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;


class SendNewsletterMailFired
{

    protected $mail;

    /**
     * SendNewsletterMailFired constructor.
     *
     * @param Mail $mail
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    /**
     * Handle the event.
     *
     * @param  SendNewsletterMail  $event
     * @return void
     */
    public function handle(SendNewsletterMail $event)
    {
        Mail::send('email.newsletter', [ 'event' => $event ], function ($m) use ($event) {
            $m->to($event->email, $event->name)->subject('Your Newsletter!');
        });
    }
}
