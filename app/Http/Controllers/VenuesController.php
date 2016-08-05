<?php

namespace App\Http\Controllers;

use App\Services\VenuesService;
use App\Venue;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
/**
 * Class VenuesController
 * @package App\Http\Controllers
 */
class VenuesController extends Controller
{
    /**
     * @var VenuesService
     */
    protected $venuesService;

    /**
     * VenuesController constructor.
     *
     * @param $venuesService
     */
    public function __construct(VenuesService $venuesService)
    {
        $this->venuesService = $venuesService;
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::with('contacts','galleries','reviews')->orderBy('created_at','DSC')->get();
        return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.create');
    }


    /**
     * @param Requests\PostVenueRequest $request
     *
     * @return mixed
     */
    public function store(Requests\PostVenueRequest $request)
    {
        $slug = $this->venuesService->generateSlug($request->get('slug'));
        if($this->venuesService->make($request)){
            session()->flash('sucMsg','Venue created sucessfully');
            return redirect('venues/'.$slug.'/contact/create');
        }
        session()->flash('errMsg','Venue couldn\'t be created');
        return redirect('venues/create')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $venue = Venue::where('slug','=',$slug)->with('contacts','galleries','reviews')->get()->first();
        
        //Similar Venues
        $venues = Venue::take(10);
        $venue->rating = $venue->reviews->avg('rating');
        if($venue->contacts){
            \Mapper::map($venue->contacts->latitude, $venue->contacts->longitude);
        }
        return view('venues.show',compact('venue','venues'));
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venue = Venue::where('slug','=',$id)->first();
        return view('venues.edit',compact('venue'));
    }


    /**
     * @param Requests\PostVenueRequest $request
     * @param $id
     *
     * @return mixed
     */
    public function update(Requests\PutVenueRequest $request, $id)
    {
        $slug = $this->venuesService->generateSlug($request->get('slug'));
        $venue = $this->venuesService->update($request,$id);
        if(!$venue){
            session()->flash('errMsg','Venue Couldn\'t be updated');
            return redirect('venues/'.$slug.'/contact/create')->withInput();
        }
        session()->flash('sucMsg','Venue updated Sucessfully :)');
        return redirect('/profile/business');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venue = Venue::destroy($id);

        if(!$venue){
            session()->flash('errMsg','Venue Cannot be Deleted');
            return redirect('/profile/business');
        }
        session()->flash('sucMsg','Venue Deleted Sucessfully :)');
        return redirect('/profile/business');
    }
}
