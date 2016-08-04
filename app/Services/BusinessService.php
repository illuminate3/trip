<?php 
namespace App\Services;

use App\Vehicle;
use App\Venue;
use App\Tour;
use App\Restaurant;
use App\Hotel;

class BusinessService 
{
	public function getBusinessUser($user_id)
	{
		$vehicle = Vehicle::where('user_id',$user_id)->get()->toArray();
		$venue = Venue::where('user_id',$user_id)->get()->toArray();
		$restaurant = Restaurant::where('user_id',$user_id)->get()->toArray();
		$hotel = Hotel::where('user_id',$user_id)->get()->toArray();
		$tour = Tour::where('user_id',$user_id)->get()->toArray();
		return collect([$vehicle,$venue,$hotel,$tour,$restaurant])->collapse();

	}
}