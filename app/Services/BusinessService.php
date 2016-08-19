<?php
namespace App\Services;

use App\Hotel;
use App\Restaurant;
use App\Tour;
use App\Vehicle;
use App\Venue;
use Auth;

class BusinessService
{

    public function getBusinessUser($user_id)
    {
        $vehicle = Vehicle::where('user_id', $user_id)->get()->toArray();
        $venue = Venue::where('user_id', $user_id)->get()->toArray();
        $restaurant = Restaurant::where('user_id', $user_id)->get()->toArray();
        $hotel = Hotel::where('user_id', $user_id)->get()->toArray();
        $tour = Tour::where('user_id', $user_id)->get()->toArray();
        return collect([['vehicle' => $vehicle, 'venue' => $venue, 'hotel' => $hotel, 'tour' => $tour, 'restaurant' => $restaurant]])->collapse();
    }


}