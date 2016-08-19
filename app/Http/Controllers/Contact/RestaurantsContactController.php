<?php

namespace App\Http\Controllers\Contact;

use App\Restaurant;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\ContactService;
use App\Services\RestaurantService;
use App\Http\Controllers\Controller;

class RestaurantsContactController extends Controller
{
    protected $contactService;
    protected $restaurantService;
    protected $model = 'restaurant';

    public function __construct(ContactService $contactService, RestaurantService $restaurantService)
    {
        $this->contactService = $contactService;
        $this->restaurantService = $restaurantService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    public function index($slug)
    {
        return view('contacts.index',compact('slug'))->with([
            'model' => $this->model,
            'contact' => $this->restaurantService->getSlugWithContact($slug)->first()
            ]);
    }


    public function create($slug)
    {
        return view('contacts.create')->with([
            'model' => $this->model,
            'class' => get_class($this)
            ]);
    }


    public function store($slug, Requests\PostContactRequest $request)
    {
        $vehicleId= $this->restaurantService->getIdBySlug($slug);
        if($this->contactService->make($this->model,$vehicleId,$request)){
            
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
