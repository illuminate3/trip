<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests;
use App\Room;
use App\Tour;
use App\Vehicle;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getHome()
    {
        $hotels = Hotel::orderBy('updated_at','DES')->with('contacts')->take(5)->get();
        $tours = Tour::orderBy('updated_at','DES')->with('contacts')->take(5)->get();
        $vehicles = Vehicle::orderBy('updated_at','DES')->with('contacts')->take(5)->get();
        $rooms = Room::orderBy('updated_at','DES')->with('hotels')->take(5)->get();
        return view('frontend.home', compact('hotels', 'tours', 'vehicles', 'rooms'));
    }

    public function getAbout()
    {
        $hotels = Hotel::orderBy('updated_at','DES')->with('contacts')->take(5)->get();
        return view('frontend.about', compact('hotels'));
    }

    public function getBlog()
    {
        $hotels = Hotel::orderBy('updated_at','DES')->with('contacts')->take(5)->get();
        return view('frontend.blog', compact('hotels'));
    }

    public function getInside()
    {
        $hotels = Hotel::with('contacts')->take(5)->get();
        return view('frontend.inside', compact('hotels'));
    }

    public function getFaq()
    {
        $hotels = Hotel::orderBy('updated_at','DES')->with('contacts')->take(5)->get();
        return view('frontend.faq', compact('hotels'));
    }
    public function getPaymentOptions()
    {
        $hotels = Hotel::orderBy('updated_at','DES')->with('contacts')->take(5)->get();
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
