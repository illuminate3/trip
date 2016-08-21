<?php

namespace App\Http\Controllers\Contact;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Services\ContactService;
use App\Services\HotelsService;
use Illuminate\Http\Request;
use App\Http\Requests;

class HotelsContactController extends Controller
{
     protected $contactService;
     protected $hotelService;
     protected $model = 'hotel';

    public function __construct(ContactService $contactService,HotelsService $hotelService)
    {
        $this->hotelService = $hotelService;
        $this->contactService = $contactService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        return view('contacts.index')->with([
            'model' => $this->model,
            'contact' => $this->hotelService->getSlugWithContacts($slug)->first()->contacts,
            'slug' => $slug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
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


    public function store($slug, Requests\PostContactRequest $request)
    {
        $id= $this->hotelService->getIdBySlug($slug);
        if($this->contactService->make($this->model,$id,$request)){
            session()->flash('sucMsg','Hotel\'s Contact Created Sucessfully');
            return redirect("hotels/".$slug);
        }
        session()->flash('errMsg','Contact Information couldn\'t be created' );
        return redirect("hotels/".$slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        return view('contacts.show')->with([
            'contact' => $this->hotelService->getContactById($slug,$id)->first(),
            'model' => $this->model,
            'slug' => $slug,
        ]);
    }

    /**
     * Show the form for editing the Hotels Contact.
     *
     * @param  string  $slug The slug of hotel
     * @param  int  $contact The id of contact
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$contact)
    {
        $contacts = $this->hotelService->getContactById($slug,$contact)->first();
        return view('contacts.edit',compact('slug'))->with([
            'model' => $this->model,
            'contact' => $contacts,
            'id'=>$contact
            ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostContactRequest  $request
     * @param  string  $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostContactRequest $request, $slug, $id)
    {
        if($this->contactService->update($id,$request)){
            session()->flash('sucMsg','Contact information Updated Sucessfuly');
            return back();
        }
        session()->flash('errMsg','Contact information couldn\'t be updated');
        return back();
    }


}
