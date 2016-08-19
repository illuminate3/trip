<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Vehicle;
use App\Venue;
use App\Tour;
use App\Restaurant;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\HotelsService;
use App\Services\VehiclesService;
use App\Services\VenuesService;
use App\Services\RestaurantsService;
use App\Services\ToursService;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{

    protected $hotelService;
    protected $tourService;
    protected $vehicleService;
    protected $venueService;
    protected $restaurantService;
    
    public function __construct(HotelsService $hotelsService, VehiclesService $vehiclesService, RestaurantsService $restaurantsService, ToursService $toursService, VenuesService $venuesService)
    {
        $this->hotelService = $hotelsService;
        $this->restaurantService = $restaurantsService;
        $this->venueService = $venuesService;
        $this->vehicleService = $vehiclesService;
        $this->tourService = $toursService;
    }
    

    /**
     * @param $type
     * @param $name
     * @return mixed
     */
    private function typeCheckerByName($type, $name)
    {
        switch ($type) {
            case 'hotel':
                return $this->hotelService->findByName($name);
                break;
            case 'restaurant':
                return $this->restaurantService->findByName($name);
                break;
            case 'venue':
                return $this->venueService->findByName($name);
                break;
            case 'vehicle':
                return $this->vehicleService->findByName($name);
                break;
            case 'tour':
                return $this->tourService->findByName($name);
                break;
            default:
                abort(404);
                break;
        }
        return $type;
    }
    private function typeCheckerByAddress($type, $address)
    {
        switch ($type) {
            case 'hotel':
                return $this->hotelService->findByAddress($address);
                break;
            case 'restaurant':
                return $this->restaurantService->findByAddress($address);
                break;
            case 'venue':
                return $this->venueService->findByAddress($address);
                break;
            case 'vehicle':
                return $this->vehicleService->findByAddress($address);
                break;
            case 'tour':
                return $this->tourService->findByAddress($address);
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
            $type = $request->get('type');
            $search = $this->typeCheckerByName($request->get('type'), $request->get('name'));
            return view('search.hotelSearch',compact('search','type'));
        }
    }
    public function searchByAddress(Request $request){
        if($request->all()){
            $address = $request->get('address');
            $type = $request->get('type');
            $search = $this->typeCheckerByAddress($type,$address);
            return view('search.hotelSearch',compact('search','type'));
        }//If request->all
    }//Search by address
}
