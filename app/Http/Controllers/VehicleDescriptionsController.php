<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\VehiclesService;
use Illuminate\Http\Request;

class VehicleDescriptionsController extends Controller
{
    protected $vehicleService;

    /**
     * VehicleDescriptionsController constructor.
     *
     * @param $vehicleService
     */
    public function __construct(VehiclesService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
        $this->middleware('auth')->except(['show','index']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $vehicles = $this->vehicleService->getTransportsFromVehicles($slug);
        return view('profile.transport',compact('vehicles','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('vehicleDescription.create', compact('slug'));
    }


    public function store(Requests\PostVehicleDescription $request, $slug )
    {
        $id = $this->vehicleService->getIdFromSlug($slug);
        if ($this->vehicleService->makeDescription($request, $id)) {
            session()->flash('sucMsg','New transport created sucessfully');
            redirect('vehicles/'.$slug.'/list');
        }
        session()->flash('errMsg','New transport couldn\'t be created sucessfully');
        redirect('vehicles/'.$slug.'/list/create')->withInput($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        $vehicle = $this->vehicleService->getBySlugVehicle($slug, $id);
        return view('vehicleDescription.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        $vehicle = $this->vehicleService->getFirstDescription($slug, $id);
        return view('vehicleDescription.edit', compact('slug', 'id', 'vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($slug, Request $request, $id)
    {
        $vehicleId = $this->vehicleService->getIdFromSlug($slug);
        if($this->vehicleService->updateDescription($request, $vehicleId, $id)){
            session()->flash('sucMsg','Transport Updated Sucessfully');
            return route('vehicles.{slug}.list.show',[$slug,$id]);
        }
        session()->flash('errMsg','Sorry error occured while updating the transport');
        return route('vehicles.{slug}.list.edit',[$slug,$id])->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
