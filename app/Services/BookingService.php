<?php


namespace App\Services;


use App\Booking;

class BookingService
{
    public function make()
    {
        $booking = Booking::create();
    }

    public function getBookingByUser($id)
    {
    	return Booking::where('user_id',$id)->orderBy('created_at','DESC')->get();
    }
    
}