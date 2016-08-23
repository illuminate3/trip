<?php


namespace App\Services;


use App\Booking;
use App\Http\Requests\PostBookingRequest;

class BookingService
{
    public function make(PostBookingRequest $request)
    {
        return Booking::create($this->data($request));
    }

    public function data($request)
    {
        return [
            'code' => $request->get('code'),//TODO: Automatic generation of code
            'bookee' => $request->get('bookee'),
            'booked_on' => $request->get('booked_on'),
            'from' => $request->get('from'),
            'to' => $request->get('to')

        ];
    }
    public function getBookingByUser($id)
    {
        return Booking::where('user_id', $id)->orderBy('updated _at', 'DESC')->get();
    }

}