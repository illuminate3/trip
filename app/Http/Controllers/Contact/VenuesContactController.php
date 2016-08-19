<?php

namespace App\Http\Controllers\Contact;


use App\Http\Controllers\Controller;
use App\Services\ContactService;
use App\Venue;
use Illuminate\Http\Request;
use App\Http\Requests;

class VenuesContactController extends Controller
{
    protected $contactService;
    protected $model = 'venue';

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
        $contacts = Venue::where('slug',$slug)->with('contacts')->first();
        return view('contacts.index',compact('slug'))->with([
            'model' => $this->model,
            'contact' => $contacts->contacts
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        
        
        return view('contacts.create',compact('slug'))->with([
            'class' => get_class($this),
            'model' => $this->model
            ]);
    }


    public function store($slug, Requests\PostContactRequest $request)
    {
        $vehicleId = $this->vehicleService->getIdBySlug($slug);
        if($this->contactService->make($this->model,$vehicleId,$request)){
            session()->flash('sucMsg','Hotel\'s Contact Created Sucessfully');
            return redirect("venues/".$slug);
        }
        session()->flash('errMsg','Contact Information couldn\'t be created' );
        return redirect("venues/".$slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        $contact = Venue::where('slug',$slug)->with('contact')->first();
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
        $venues = Venue::where('slug',$slug)->with(['contacts'=>function($query) use ($contact){
            return $query->findOrFail($contact);
        }])->first();
        
        return view('contacts.edit')->with([
            'contact' => $venues,
            'id' => $contact,
            'model' => $this->model
            ]);
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
        //
    }
}
