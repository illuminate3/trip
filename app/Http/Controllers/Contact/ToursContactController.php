<?php

namespace App\Http\Controllers\Contact;

use App\Http\Requests;
use App\Services\ToursService;
use App\Services\ContactService;
use App\Http\Controllers\Controller;


/**
 * Class ToursContactController
 * @package App\Http\Controllers\Contact
 */
class ToursContactController extends Controller
{
    /**
     * @var ContactService
     */
    protected $contactService;
    /**
     * @var ToursService
     */
    protected $tourService;
    /**
     * @var string
     */
    protected $model = 'tour';

    /**
     * ToursContactController constructor.
     *
     * @param ContactService $contactService
     * @param ToursService $toursService
     */
    public function __construct(ContactService $contactService, ToursService $toursService)
    {
        $this->contactService = $contactService;
        $this->tourService = $toursService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        return view('contacts.index')->with([
            'model' => $this->model,
            'contact' => $this->tourService->getSlugWithContact($slug)->first()->contacts,
            'slug' => $slug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('contacts.create')->with([
            'model' => $this->model,
            'class' => get_class($this),
            'slug' => $slug
        ]);
    }


    /**
     * @param $slug
     * @param Requests\PostContactRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($slug, Requests\PostContactRequest $request)
    {
        $id = $this->tourService->getIdBySlug($slug);
        if ($this->contactService->make($this->model, $id, $request)) {
            session()->flash('sucMsg', 'Tour\'s contact created sucessfully');
            return redirect("tours/" . $slug);
        }
        session()->flash('errMsg', 'Contact Information couldn\'t be created');
        return redirect("tours/" . $slug);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        return view('contacts.show')->with([
            'contact' => $this->tourService->getContactById($slug,$id)->first(),
            'slug' => $slug,
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $slug The slug of tour
     * @param  int $contact
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $contact)
    {
        return view('contacts.edit')->with([
            'model' => $this->model,
            'id' => $contact,
            'contact' => $this->tourService->getContactById($slug, $contact)->first(),
            'slug' => $slug,
        ]);
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
            return redirect($this->model.'s/'.$slug.'/contact');
        }
        session()->flash('errMsg','Contact information couldn\'t be updated');
        return redirect($this->model.'s/'.$slug.'/contact/'.$id.'/edit')->withInput($request->toArray());
    }


}
