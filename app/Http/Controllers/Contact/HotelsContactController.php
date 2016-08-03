<?php

namespace App\Http\Controllers\Contact;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Services\ContactService;
use Illuminate\Http\Request;

use App\Http\Requests;

class HotelsContactController extends Controller
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
        $galleries = Hotel::where('slug',$slug)->with('contacts')->first();
        dd($galleries);
        return view('contact.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $class = get_class($this);
        $model = 'hotel';
        return view('contact.create',compact('class','model','slug'));
    }


    public function store($slug, Requests\PostContactRequest $request)
    {
        $vehicleId= Hotel::select('id')->where('slug',$slug)->first()->id;
        if($this->contactService->make('hotels',$vehicleId,$request)){
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
        $galleries = Hotel::where('slug',$slug)->with('galleries')->first();

        return view('contact.show',compact('galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
