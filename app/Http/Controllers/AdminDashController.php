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
        return "HOTEL";
    }

    public function getTours()
    {
        $tours = Tour::all();
        return view('dashboard.tours', compact('tours'));
    }

    public function getTourCreate()
    {
        return "Register Tour";
    }

    public function getVenues()
    {
        $venues = Venue::all();
        return view('dashboard.venues', compact('venues'));
    }

    public function getVenueCreate()
    {
        return "Reig";
    }

    public function getVehicles()
    {
        $vehicles = Vehicle::all();
        return view('dashboard.vehicles', compact('vehicles'));
    }

    public function getVehicleCreate()
    {
        return 'Register Vehicles';
    }
    public function getUsers(){
        $users = User::orderBy('updated_at','DES')->get();
        dd($users);

    }

    public function approve($model, $id)
    {
        if ($this->adminService->approveBusiness($id, $model)) {
            return redirect()->back()->with('success', 'Business Approved Sucessfully');
        }
        return redirect()->back()->with('error', 'Couldn\'t approve business');
    }

    public function suspend($model, $id)
    {
        if ($this->adminService->suspendBusiness($id, $model)) {
            return redirect()->back()->with('success', 'Business Suspended Sucessfully');
        }
        return redirect()->back()->with('error', 'Couldn\'t suspend business');
    }

}
