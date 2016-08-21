<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BookingEvent extends Event
{
    use SerializesModels;
    public $name;
    public $bookingId;
    public $userId;
    public $type;

    /**
     * BookingEvent constructor.
     *
     * @param string $name "The message for the booking"
     * @param string $bookingId "The id of the saved Booking"
     * @param string $userId "The id of the user "
     * @param string $type "Type of message"
     */
    public function __construct($name, $bookingId, $userId, $type)
    {
        $this->name = $name;
        $this->bookingId = $bookingId;
        $this->userId = $userId;
        $this->type = $type;
    }


    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['booking-request-channel'];
    }
}
