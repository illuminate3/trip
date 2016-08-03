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
        $contact = Venue::where('slug',$slug)->with('contacts')->first();
        $model = 'venue';
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
        $model = 'venue';
        return view('contacts.create',compact('class','model','slug'));
    }


    public function store($slug, Requests\PostContactRequest $request)
    {
        $vehicleId = Venue::where('slug','=',$slug)->get()->first();
        dd($vehicleId);
        if($this->contactService->make('venue',$vehicleId,$request)){
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
    public function edit($slug,$id)
    {
         $contact = Venue::where('slug','=',$slug)->with(['contacts'=>function($query) use ($id){
            $query->find($id);
        }])->first();
        dd($contact);
        $model = 'venue';
        return view('contacts.edit',compact('contact','model','slug'));
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
