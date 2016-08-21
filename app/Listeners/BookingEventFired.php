<?php

namespace App\Listeners;

use App\Events\BookingEvent;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;

class BookingEventFired
{


    /**
     * Handle the event.
     *
     * @param  BookingEvent  $event
     * @return void
     */
    public function handle(BookingEvent $event)
    {
        $pusher = App::make('pusher');
        $time = Carbon::now();
        $pusher->trigger('booking-request-channel','booking-channel',
            array(
                'text' => $event->name,
                'userId' => $event->userId,
                'booking_id' => $event->bookingId,
                'created_at' => $time->toDateTimeString()
            ));
    }
}
