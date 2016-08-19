<?php
namespace App\Http\Controllers;

use App\Booking;
use App\Services\BusinessService;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public $business;

    public function __construct(BusinessService $business)
    {
        $this->business = $business;
        $this->middleware('auth');
    }

    public function getProfile()
    {
        $user = User::find(Auth::user()->id)->first();
        return view('frontend.profile', compact('user'));
    }

    public function getBusiness()
    {
        $userId = Auth::user()->id;
        $businesses = $this->business->getBusinessUser($userId);

        return view('profile.business', compact('businesses'));

    }

    public function getAddBusiness()
    {
        return view('profile.addBusiness');
    }

    public function getUserBooking()
    {
        $bookings = Booking::all();
        return view('profile.bookings', compact('bookings'));
    }
}
