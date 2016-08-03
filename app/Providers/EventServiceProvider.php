<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        //Event when the booking has been made 
         'App\Events\SendBookingMail' => [
            'App\Listeners\SendBookingMailFired',
        ],
        //Event when the newsleter has been sent to the user for verification
        'App\Events\SendNewsletterMail' => [
            'App\Listeners\SendNewsletterMailFired',
        ],
        //Event when the Notification is made
        'App\Events\NotificationEvent' => [
            'App\Listeners\NotificationEventFired',
        ],
        //Event when the Booking has been made
        'App\Events\BookinEvent' => [
            'App\Listeners\BookingEventFired',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
