<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Vehicle;
use App\Venue;
use App\Tour;
use App\Restaurant;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{
    /**
     * @param $name
     * @return mixed
     */
    protected function searchHotelByName($name)
    {
        return Hotel::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    /**
     * @param $name
     * @return mixed
     */
    private function searchVehicleByName($name)
    {
        return Vehicle::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    /**
     * @param $name
     * @return mixed
     */
    private function searchVenueByName($name)
    {
        return Venue::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    /**
     * @param $name
     * @return mixed
     */
    private function searchTourByName($name)
    {
        return Tour::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    /**
     * @param $name
     * @return mixed
     */
    private function searchRestaurantByName($name)
    {
        return Restaurant::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    /**
     * @param $type
     * @param $name
     * @return mixed
     */
    private function typeChecker($type, $name)
    {
        switch ($type) {
            case 'hotel':
                return $this->searchHotelByName($name);
                break;
            case 'restaurant':
                return $this->searchRestaurantByName($name);
                break;
            case 'venue':
                return $this->searchVenueByName($name);
                break;
            case 'vehicle':
                return $this->searchVehicleByName($name);
                break;
            case 'tour':
                return $this->searchTourByName($name);
                break;
            default:
                abort(404);
                break;
        }
        return $type;
    }


    public function searchByName(Request $request)
    {
        if ($request->all()) {
            $search = $this->typeChecker($request->get('type'), $request->get('name'));
            echo "<h1>Search Results for ".$request->get('name')  ."</h1>";
            foreach($search as $s){
                echo $s->name."<br>";
                echo "<img src='$s->logo' class='img-thumbnail img-responsive'><hr>";
            }
        }
    }
}
