<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use App\Tour;
use App\Faq;
use App\Vehicle;
use App\Carousel;
use App\Services\CarouselService;
use App\Services\HotelsService;
use App\Services\ToursService;
use App\Services\VehiclesService;

class SiteController extends Controller
{
    public $carousel;
    protected $hotel;
    protected $tour;
    protected $vehicle;

    public function __controller(CarouselService $carousel, VehicleService $vehicle, ToursService $tour, HotelsService $hotel)
    {
        $this->carousel = $carousel;
        $this->hotel = $hotel;
        $this->tour = $tour;
        $this->vehicle = $vehicle;
    }
    public function getHome()
    {
        
        return view('frontend.home')->with([
                'hotels' => Hotel::orderBy('updated_at', 'DES')->with('contacts')->take(5)->get(),
                'tours' => Tour::orderBy('updated_at', 'DES')->with('contacts')->take(5)->get(),
                'vehicles' => Vehicle::orderBy('updated_at', 'DES')->with('contacts')->take(5)->get(),
                'rooms' => Room::orderBy('updated_at', 'DES')->with('hotels')->take(5)->get(),
                'carousels' => Carousel::where('image','!=',null)->orderBy('position')->take(3)->get(),
            ]);
    }

    public function getAbout()
    {
        $hotels = Hotel::orderBy('updated_at', 'DES')->with('contacts')->take(5)->get();
        return view('frontend.about', compact('hotels'));
    }

    public function getBlog()
    {
        $hotels = Hotel::orderBy('updated_at', 'DES')->with('contacts')->take(5)->get();
        return view('frontend.blog', compact('hotels'));
    }

    public function getInside()
    {
        $hotels = Hotel::with('contacts')->take(5)->get();
        return view('frontend.inside', compact('hotels'));
    }

    public function getFaq()
    {
        $hotels = Hotel::orderBy('updated_at', 'DES')->with('contacts')->take(5)->get();
        $faqs = Faq::all();
        return view('frontend.faq', compact('hotels','faqs'));
    }

    public function getPaymentOptions()
    {
        $hotels = Hotel::orderBy('updated_at', 'DES')->with('contacts')->take(5)->get();
        return view('frontend.paymentOptions', compact('hotels'));
    }


    public function getContact()
    {
        $hotels = Hotel::with('contacts')->take(5)->get();
        return view('frontend.contact', compact('hotels'));
    }

    public function getHotelBooking()
    {
        return view('frontend.roomBooking');
    }

}
