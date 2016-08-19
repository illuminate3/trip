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
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $contact = $this->hotelService->getSlugContacts($slug)->first()->contacts;
        return view('contacts.index',compact('contact','slug'))->with(['model' => $this->model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('contacts.create',compact('slug'))->with(['model' => $this->model, 'class' => get_class($this)]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        $contact = Hotel::where('slug',$slug)->with('contacts')->first();
        $model = $this->model;
        return view('contacts.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
