<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BookedEvent extends Event
{
    use SerializesModels;
    protected $message;
    protected $bookingId;
    protected $userId;
    protected $type;

    /**
     * BookedEvent constructor.
     *
     * @param $message
     * @param $bookingId
     * @param $userId
     * @param $type
     */
    public function __construct($message, $bookingId, $userId, $type)
    {
        $this->message = $message;
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
        return ['booking-accept-channel'];
    }
}
