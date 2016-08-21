<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NotificationEvent extends Event
{
    use SerializesModels;

    /**
     * @var string $message Message Send by the notification
     */
    public $message;
    /**
     * @var string $type Type of notification success or failure
     */
    public $type;
    /**
     * @var string $userId For which user is the notification
     */
    public $userId;

    /**
     * NotificationEvent constructor.
     *
     * @param $message
     * @param $userId
     * @param $type
     */
    public function __construct($message, $userId, $type)
    {
        $this->message = $message;
        $this->type = $type;
        $this->userId = $userId;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['notification-channel'];
    }
}
