<?php 
namespace App\Services;
use Auth;
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
		
		//$vehicle = array_add($vehicle, 'model', 'Vehicle');

		$venue = Venue::where('user_id',$user_id)->get()->toArray();
		
		//$venue->zip(['model'=>'Venue']);
		//$venue = array_add($venue,'model','Venue');

		$restaurant = Restaurant::where('user_id',$user_id)->get()->toArray();
		
		//$restaurant = array_add($venue,'model','Venue');

		$hotel = Hotel::where('user_id',$user_id)->get()->toArray();
		//$hotel = array_add($hotel,'model','Hotel');
		
		$tour = Tour::where('user_id',$user_id)->get()->toArray();
		//$tour = array_add($tour,'model','Tour');
 
		

		return collect([['vehicle'=>$vehicle,'venue'=> $venue,'hotel'=>$hotel, 'tour'=>$tour, 'restaurant'=>$restaurant]])->collapse();

	}
}