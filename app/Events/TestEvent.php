<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent extends Event
{
    use SerializesModels;

    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function broadcastOn()
    {
       return ['test-channel'];
    }
}
