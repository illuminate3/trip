<?php

namespace App\Listeners;

use App\Events\NotificationEvent;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class NotificationEventFired
{
    /**
     * Handle the notification by sending a message to the pusher with user id .
     *
     * @param  NotificationEvent  $event
     * @return void
     */
    public function handle(NotificationEvent $event)
    {
        $pusher = App::make('pusher');
        $time = Carbon::now();
        $pusher->trigger('notification-channel','get-user-notification',
            array(
                'text' => $event->name,
                'userId' => $event->userId,
                'type' => $event->type,
                'created_at' => $time->toDateTimeString()
            ));
    }
}
