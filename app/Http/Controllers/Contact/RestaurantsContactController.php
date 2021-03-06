<?php

namespace App\Http\Controllers\Contact;

use App\Http\Requests;
use App\Services\ContactService;
use App\Http\Controllers\Controller;
use App\Services\RestaurantsService;

class RestaurantsContactController extends Controller
{
    protected $contactService;
    protected $restaurantService;
    protected $model = 'restaurant';

    public function __construct(ContactService $contactService, RestaurantsService $restaurantService)
    {
        $this->contactService = $contactService;
        $this->restaurantService = $restaurantService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    public function index($slug)
    {
        return view('contacts.index')->with([
            'model' => $this->model,
            'contact' => $this->restaurantService->getSlugWithContact($slug)->first()->contacts,
            'slug' => $slug
        ]);
    }


    public function create($slug)
    {
        return view('contacts.create')->with([
            'model' => $this->model,
            'class' => get_class($this),
            'slug' => $slug
        ]);
    }


    public function store($slug, Requests\PostContactRequest $request)
    {
        $restaurantId = $this->restaurantService->getIdBySlug($slug);
        if ($this->contactService->make($this->model, $restaurantId, $request)) {
            session()->flash('sucMsg', 'Restaurant\'s contact created');
            return redirect()
                ->route($this->model.'s.{slug}.contact.index',[$slug]);
        }
        session()->flash('errMsg', 'Contact Information couldn\'t be created');
        return redirect()
            ->route($this->model.'s.{slug}.contact.create',[$slug])
            ->withInput($request->toArray());

    }


    public function show($slug, $id)
    {
        return redirect()->route($this->model.'s.{slug}.contact.index')->with(['slug' => $slug, 'id' =>$id]);
    }

    public function edit($slug, $contact)
    {
        return view('contacts.edit')->with([
            'model' => $this->model,
            'contact' => $this->restaurantService->getSlugAndContactId($slug, $contact)->first(),
            'slug' => $slug,
            'id' => $contact
        ]);
    }


    public function update(Requests\PostContactRequest $request,$slug, $id)
    {
        if($this->contactService->update($id,$request)){
            session()->flash('sucMsg','Contact information Updated');
            return redirect()
                ->route($this->model.'s.{slug}.contact.index',[$slug]);
        }
        session()->flash('errMsg','Contact information couldn\'t be updated');
        return redirect()
            ->route($this->model.'s.{slug}.contact.edit',[$slug,$id])
            ->withInput($request->toArray());
    }

}
