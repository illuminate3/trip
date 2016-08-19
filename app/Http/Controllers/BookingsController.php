<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use Auth;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    public $bookingService;

    public function __construct(BookingService $bookingService)
    {

        $this->bookingService = $bookingService;
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::loginUsingId(1);
        $bookings = $this->bookingService->getBookingByUser(1);
        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels = Hotels::all()->toArray();
        return view('booking.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    if($this->bookingService->make($request)){
        $pusher = Illuminate\Support\Facades\App::make('pusher');
        $date = new DateTime();
        $pusher->trigger('notification',
            'get-booking-notification',
            array(
                'text' => 'A new Booking has been made',
                'userId' => '1',
                'type' => 'success',
                'created_at' => $date->format('d M Y')
            ));
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id)->first();
        return view('booking.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
