<?php

namespace App\Http\Controllers\Contact;


use App\Http\Requests;
use App\Services\VenuesService;
use App\Services\ContactService;
use App\Http\Controllers\Controller;

/**
 * Class VenuesContactController
 * @package App\Http\Controllers\Contact
 */
class VenuesContactController extends Controller
{
    /**
     * @var ContactService
     */
    protected $contactService;
    /**
     * @var VenuesService
     */
    protected $venueService;
    /**
     * @var string
     */
    protected $model = 'venue';

    /**
     * VenuesContactController constructor.
     *
     * @param ContactService $contactService
     * @param VenuesService $venuesService
     */
    public function __construct(ContactService $contactService, VenuesService $venuesService)
    {
        $this->contactService = $contactService;
        $this->venueService = $venuesService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        return view('contacts.index', compact('slug'))->with([
            'model' => $this->model,
            'contact' => $this->venueService->getSlugWithContact($slug)->first()->contacts,
            'slug' => $slug
        ]);
    }


    /**
     * @param $slug
     *
     * @return $this
     */
    public function create($slug)
    {
        return view('contacts.create')->with([
            'class' => get_class($this),
            'model' => $this->model,
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

        $id = $this->venueService->getIdBySlug($slug);
        if ($this->contactService->make($this->model, $id, $request)) {
            session()->flash('sucMsg', 'Hotel\'s Contact Created Sucessfully');
            return redirect("venues/" . $slug);
        }
        session()->flash('errMsg', 'Contact Information couldn\'t be created');
        return redirect("venues/" . $slug);

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
        return view('contacts.show')->with([
            'contact' => $this->venueService->getSlugWithContact($slug)->first(),
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug The Slug of the Venue
     * @param  int $contact The Id of the contact
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $contact)
    {
        $venues = $this->venueService->getSlugAndContactId($slug, $contact)->first();
        return view('contacts.edit')->with([
            'contact' => $venues,
            'id' => $contact,
            'slug' => $slug,
            'model' => $this->model
        ]);
    }


    /**
     * @param Requests\PostContactRequest $request
     * @param string $slug
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Requests\PostContactRequest $request,$slug, $id)
    {
        if($this->contactService->update($id,$request)){
            session()->flash('sucMsg','Contact information Updated Sucessfuly');
            return redirect($this->model.'s/'.$slug.'/contact');
        }
        session()->flash('errMsg','Contact information couldn\'t be updated');
        return redirect($this->model.'s/'.$slug.'/contact/'.$id.'/edit')->withInput($request->toArray());
    }

}
