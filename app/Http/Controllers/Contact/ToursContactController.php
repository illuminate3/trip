<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Tour;
use App\Services\ContactService;
use Illuminate\Http\Request;
use App\Http\Requests;

class ToursContactController extends Controller
{
    protected $contactService;
    protected $model = 'tour';

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
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
        $contacts = Tour::where('slug',$slug)->with('galleries')->first();
        $model = 'tour';
        $contact= $contacts->contacts;
        return view('contacts.index',compact('contact','model','slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $class = get_class($this);
        $model = $this->model;
        return view('contacts.create',compact('class','model','slug'));
    }


    public function store($slug, Requests\PostGalleryRequest $request)
    {
        $vehicleId= Tour::select('id')->where('slug',$slug)->first()->id;
        if($this->contactsService->make('tour',$vehicleId,$request)){
            session()->flash('sucMsg','Tour\'s contact created sucessfully');
            return redirect("tours/".$slug);
        }
        session()->flash('errMsg','Contact Information couldn\'t be created' );
        return redirect("tours/".$slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        $galleries = Tour::where('slug',$slug)->with('galleries')->first();

        return view('contacts.show',compact('galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$contact)
    {
        $model = $this->model;
        $id = $contact;
        $contact = Tour::where('slug',$slug)->with(['contacts'=>function($query) use ($id){
            return $query->findOrFail($id);
        }])->first();
        
        return view('contacts.edit',compact('contact','slug','model','id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
