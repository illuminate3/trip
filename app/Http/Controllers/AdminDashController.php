<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests;
use App\Restaurant;
use App\Services\AdminService;
use App\Tour;
use App\Vehicle;
use App\Venue;
use App\User;
use Shinobi;
use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function getRestaurants()
    {
        $restaurants = Restaurant::all(); 
        return view('dashboard.restaurant', compact("restaurants") );
    }

    public function getRestaurantsCreate()
    {
        return "Restaurant Admin";
    }

    public function getHotels()
    {
        $hotels = Hotel::all();
        return view('dashboard.hotels', compact('hotels'));
    }

    public function getHotelCreate()
    {
        return redirect('/hotels/create');
    }

    public function getTours()
    {
        $tours = Tour::all();
        return view('dashboard.tours', compact('tours'));
    }

    public function getTourCreate()
    {
        return redirect('/tours/create');
    }

    public function getVenues()
    {
        $venues = Venue::all();
        return view('dashboard.venues', compact('venues'));
    }

    public function getVenueCreate()
    {
        return redirect('/venues/create');
        
    }

    public function getVehicles()
    {
        $vehicles = Vehicle::all();
        return view('dashboard.vehicles', compact('vehicles'));
    }

    public function getVehicleCreate()
    {
        return redirect('/vehicles/create');
    }
    public function getUsers(){
        $users = User::orderBy('updated_at','DES')->get();
        dd($users);

    }

    public function approve($model, $id)
    {
        if ($this->adminService->approveBusiness($id, $model)) {
            session()->flash('sucMsg', 'Business Approved Sucessfully');
            return back();
        }
        session()->flash('errMsg', 'Couldn\'t approve business');
        return back();
    }

    public function suspend($model, $id)
    {
        if ($this->adminService->suspendBusiness($id, $model)) {
            session()->with('sucMsg', 'Business Suspended Sucessfully');
            return back();
        }
        session()->with('errMsg', 'Couldn\'t suspend business');
        return back();
    }
    public function getProfile()
    {

    }

}
