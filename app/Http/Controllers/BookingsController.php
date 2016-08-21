<?php

namespace App\Http\Controllers;

use App\Events\BookingEvent;
use App\Events\Event;
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
        //TODO : Set booking Id to the event
        if($this->bookingService->make($request)){
            Event::fire(new BookingEvent("Booking sucessfully made wait for response", 0, Auth::user()->id, 'sucess'));
        }
        Event::fire(new BookingEvent("Booking was not made", 0, Auth::user()->id, 'error'));

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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        if($booking->delete())
        {
            session()->flash('sucMsg','Booking Deleted');
            redirect()->back();
        }
        session()->flash('errMsg','Booking couldn\'t be deleted');
        redirect()->back();

    }
}
