<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Services\ContactService;
use Illuminate\Http\Request;

use App\Http\Requests;

class RestaurantsContactController extends Controller
{
    protected $contactService;
    protected $model = 'restaurant';

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    public function index($slug)
    {
        $contacts = Restaurant::where('slug',$slug)->with('contacts')->first();
        $model = 'hotel';
        $contact= $contact->contacts;
        return view('contacts.index',compact('contact','model','slug'));
    }


    public function create($slug)
    {
        $class = get_class($this);
        $model = 'restaurant';
        return view('contacts.create',compact('class','model','slug'));
    }


    public function store($slug, Requests\PostContactRequest $request)
    {
        $vehicleId= Restaurant::select('id')->where('slug',$slug)->first()->id;
        if($this->contactService->make('restaurant',$vehicleId,$request)){
            session()->flash('sucMsg','Restaurant\'s contact created sucessfully');
            return redirect("restaurants/".$slug);
        }
        session()->flash('errMsg','Contact Information couldn\'t be created' );
        return redirect("restaurants/".$slug);
        
    }


    public function show($slug,$id)
    {
        $galleries = Restaurant::where('slug',$slug)->with('galleries')->first();
        dd($galleries);
        return view('contact.show',compact('galleries'));
    }

    public function edit($slug,$contact)
    {
        $model = $this->model;
        $id = $contact;
        $contact = Restaurant::where('slug',$slug)->with(['contacts'=>function($query) use ($id){
            return $query->findOrFail($id);
        }])->first();
        
        return view('contacts.edit',compact('contact','slug','model','id'));
    }


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
