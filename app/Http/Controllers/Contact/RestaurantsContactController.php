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

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    public function index($slug)
    {
        $galleries = Restaurant::where('slug',$slug)->with('contacts')->first();
        dd($galleries->contacts);
        return view('contacts.index',compact('galleries'));
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
            exit('done');
        }
    }


    public function show($slug,$id)
    {
        $galleries = Restaurant::where('slug',$slug)->with('galleries')->first();
        dd($galleries);
        return view('contact.show',compact('galleries'));
    }

    public function edit($slug,$id)
    {
        $class = get_class($this);
        $model = 'restaurant';
        return view('contact.create',compact('class','model','slug'));
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
