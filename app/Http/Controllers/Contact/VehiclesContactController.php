<?php

namespace App\Http\Controllers\Contact;

use App\Http\Requests;
use App\Services\ContactService;
use App\Services\VehiclesService;
use App\Http\Controllers\Controller;

/**
 * Class VehiclesContactController
 * @package App\Http\Controllers\Contact
 */
class VehiclesContactController extends Controller
{
    /**
     * @var ContactService
     */
    protected $contactService;
    /**
     * @var VehiclesService
     */
    protected $vehicleService;
    /**
     * @var string
     */
    protected $model = 'vehicle';

    /**
     * VehiclesContactController constructor.
     *
     * @param ContactService $contactService
     * @param VehiclesService $vehicleService
     */
    public function __construct(ContactService $contactService, VehiclesService $vehicleService)
    {
        $this->contactService = $contactService;
        $this->vehicleService = $vehicleService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {

        return view('contacts.index')->with([
            'model' => $this->model,
            'contact' => $this->vehicleService->getSlugWithContacts($slug)->first()->contacts,
            'slug' => $slug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $slug The Slug of the parent vehicle
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('contacts.create', compact('slug'))->with([
            'model' => $this->model,
            'class' => get_class($this),
            'slug' => $slug
        ]);
    }


    /**
     * @param $slug
     * @param Requests\PostContactRequest $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($slug, Requests\PostContactRequest $request)
    {
        $vehicleId = $this->vehicleService->getIdBySlug($slug);
        if ($this->contactService->make($this->model, $vehicleId, $request)) {
            session()->flash('sucMsg', 'Vehicle\'s contact created sucessfully');
            return redirect()->route($this->model.'s.{slug}.contact.index',[$slug]);
        }
        session()->flash('errMsg', 'Contact Information couldn\'t be created');
        return redirect()
            ->route($this->model.'s.{slug}.contact.create',[$slug])
            ->withInput($request->toArray());
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

        return redirect()->route('vehicles.{slug}.contact.index', [$slug])->with(['id' => $id]);
    }

    /**
     * @param $slug
     * @param $contact
     *
     * @return $this
     */
    public function edit($slug, $contact)
    {

        $vehicles = $this->vehicleService->getContactBySlugId($slug, $contact)->first();
        if ($vehicles) {

            return view('contacts.edit')->with([
                'model' => $this->model,
                'contact' => $vehicles,
                'id' => $contact,
                'slug' => $slug
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostContactRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostContactRequest $request,$slug, $id)
    {
        if($this->contactService->update($id,$request)){
            session()->flash('sucMsg','Contact information Updated');
            return redirect()->route($this->model.'s.{slug}.contact.index',[$slug]);
        }
        session()->flash('errMsg','Contact information couldn\'t be updated');
        return redirect()->route($this->model.'s.{slug}.contact.edit',[$slug,$id])->withInput($request->toArray());
    }


}
