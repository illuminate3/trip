<?php


namespace App\Services;


use App\Booking;

class BookingService
{
    public function make()
    {
        $booking = Booking::create();
    }
}