<?php


namespace App\Infinite\Helpers;


class Notification
{
    public $text;
    /**
     * Notification constructor.
     */
    public function __construct($text)
    {
        $this->text = $text;
    }
}