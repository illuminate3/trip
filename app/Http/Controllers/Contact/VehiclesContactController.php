<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Services\ContactService;
use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;

class VehiclesContactController extends Controller
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
        $contact = Vehicle::where('slug',$slug)->with('contacts')->first()->contacts;
        $model = 'vehicle';
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
        $model = 'vehicle';
        return view('contacts.create',compact('class','model','slug'));
    }


    public function store($slug, Requests\PostContactRequest $request)
    {
        $vehicleId= Vehicle::select('id')->where('slug',$slug)->first()->id;
        if($this->contactService->make('vehicle',$vehicleId,$request)){
            exit('done');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        $galleries = Vehicle::where('slug',$slug)->with('galleries')->first();
        dd($galleries);
        return views('contacts.show',compact('galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$id)
    {
        $contact = Vehicle::where('slug',$slug)->with(['contacts'=>function($query) use ($id){
            $query->find($id);
        }])->first()->contacts;
        
        $model = 'vehicle';
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
