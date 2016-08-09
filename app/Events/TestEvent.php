<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent extends Event
{
    use SerializesModels;

    public $text;
    public $userId;

    public function __construct($text,$userId)
    {
        $this->text = $text;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
       return ['notification'];
    }
}
