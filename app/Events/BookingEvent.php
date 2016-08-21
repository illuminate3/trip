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

    /**
     * BookingEvent constructor.
     *
     * @param $name
     * @param $bookingId
     * @param $userId
     */
    public function __construct($name, $bookingId, $userId)
    {
        $this->name = $name;
        $this->bookingId = $bookingId;
        $this->userId = $userId;
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
