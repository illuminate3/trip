<?php

namespace App\Http\Controllers;

use App\Services\VehiclesService;
use App\Vehicle;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class VehiclesController extends Controller
{
    protected $vehicleService;

    /**
     * VehiclesController constructor.
     *
     * @param $vehicleService
     */
    public function __construct(VehiclesService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::with('contacts', 'galleries')->orderBy('created_at','DSC')->get();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }


    public function store(Requests\PostVehicleRequest $request)
    {
        $slug = $this->vehicleService($request->get('slug'));
        if (!$this->vehicleService->make($request)) {
            session()->with('errMsg', 'Vehicle Couldn\'t be created');
            return redirect('/vehicles/create')->withInput();    
        }
        session()->with('sucMsg', 'Vehicle created Sucessfully :)');
        return redirect('/vehicles/'.$slug.'/contact/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $vehicle = Vehicle::where('slug', '=', $slug)->with('contacts', 'reviews', 'galleries')->first();
        $vehicles = Vehicle::take(10);
        $vehicle->rating = $vehicle->reviews()->avg('rating');
        if($vehicle->contacts){
            \Mapper::map($vehicle->contacts->latitude, $vehicle->contacts->longitude);
        }
        return view('vehicles.show', compact('vehicle','vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($vehicles)
    {
        $vehicle = Vehicle::where(['slug'=> $vehicles])->get()->first();
        return view('vehicles.edit', compact('vehicle'));
    }


    public function update(Requests\PutVenueRequest $request, $id)
    {
        $slug = $this->vehicleService($request->get('slug'));
        if($this->vehicleService->update($id, $request)){
            session()->with('error','Vehicle couldn\'t be updated');
            return redirect('vehicles/'.$request->get('slug').'/edit')->withInput();

        }
        session()->with('success','Vehicle updated Sucessfully :)');
        return redirect('/vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::destroy($id);
        if (!$vehicle) {
            session()->with('error', 'Vehicle Cannot be Deleted');
            return redirect('/profile/business');
        }
        session()->with('success', 'Vehicle Deleted Sucessfully :)');
        return redirect('/profile/business');
    }
}
