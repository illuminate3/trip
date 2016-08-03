<?php

namespace App\Http\Controllers;

use App\Services\ToursService;
use App\Tour;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\Request\VenuePostRequest;

class ToursController extends Controller
{
    protected $tourService;

    /**
     * ToursController constructor.
     *
     * @param $tourService
     */
    public function __construct(ToursService $tourService)
    {
        $this->tourService = $tourService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::with('contacts','packages')->orderBy('created_at','DESC')->get();
        return view('tours.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tours.create');
    }


    public function store(Requests\PostTourRequest $request)
    {
        if(!$this->tourService->make($request)){
            return session()->with('error','Tour Couldn\'t be created');
        }
        return session()->with('success','Tour created Sucessfully :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tour = Tour::where('slug','=',$slug)->with('contacts', 'galleries','reviews','packages')->first();
        dd($tour);
        $tour->rating = $tour->reviews()->avg('rating');
        \Mapper::map($tour->contacts->latitude, $tour->contacts->longitude);
        return view('tours.show',compact('tour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tour = Tour::where('slug','=',$id)->first();
        return view('tours.edit',compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostTourRequest $request, $id)
    {
        $tour = Tour::create($request->all);
        if(!$tour){
            return session()->with('error','Tour Couldn\'t be updated');
        }
        return session()->with('success','Tour updated Sucessfully :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::destroy($id);

        if(!$tour){
            return session()->with('error','Tour Cannot be Deleted');
        }
        return session()->with('success','Tour Deleted Sucessfully :)');
    }
}
