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
        return view('profile.transport')->with([
            'vehicles' => $this->vehicleService->getTransportsFromVehicles($slug),
            'slug' => $slug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('vehicleDescription.create')->with(['slug' => $slug]);
    }


    public function store(Requests\PostVehicleDescription $request, $slug )
    {
        $id = $this->vehicleService->getIdFromSlug($slug);
        if ($this->vehicleService->makeDescription($request, $id)) {
            session()->flash('sucMsg','New transport created');
            return redirect('vehicles/'.$slug.'/list');
        }
        session()->flash('errMsg','New transport couldn\'t be created sucessfully');
        return redirect('vehicles/'.$slug.'/list/create')->withInput($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        return view('vehicleDescription.show')->with([
            'vehicle' => $this->vehicleService->getBySlugVehicle($slug, $id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        return view('vehicleDescription.edit')->with([
            'vehicle' => $this->vehicleService->getFirstDescription($slug, $id),
            'slug' => $slug,
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $slug
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($slug, Request $request, $id)
    {
        $vehicleId = $this->vehicleService->getIdFromSlug($slug);
        if($this->vehicleService->updateDescription($request, $vehicleId, $id)){
            session()->flash('sucMsg','Transport Updated');
            return redirect()->route('vehicles.{slug}.list.show',[$slug,$id]);
        }
        session()->flash('errMsg','Transport couldn\'t be updated');
        return redirect()->route('vehicles.{slug}.list.edit',[$slug,$id])->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {

        if($this->vehicleService->destroyDescription($id))
        {
            session()->flash('sucMsg','Transport deleted');
            return redirect()->route('vehicles.{slug}.list.index');
        }
        session()->flash('errMsg','Transport couldn\'t be deleted');
        return redirect()->route('vehicles.{slug}.list.index');
    }
}
