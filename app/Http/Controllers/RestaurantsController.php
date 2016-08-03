<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Http\Requests;
use App\Services\RestaurantsService;
use Illuminate\Http\Request;
use App\Http\Requests\Request\VenuePostRequest;

class RestaurantsController extends Controller
{
    protected $restaurantService;

    /**
     * RestaurantsController constructor.
     *
     * @param $restaurantService
     */
    public function __construct(RestaurantsService $restaurantService)
    {
        $this->restaurantService = $restaurantService;
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
        $restaurants = $this->restaurantService->getRecent();
        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }


    public function store(Requests\PostRestaurantRequest $request)
    {
        if( $this->restaurantService->make($request) ){
            return session()->with('error','Restaurant Couldn\'t be created');
        }
        return session()->with('success','Restaurant created Sucessfully :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug','=',$slug)->with('contacts','reviews', 'galleries')->first();
        $restaurants = Restaurant::take(10);
        $restaurant->rating = $restaurant->reviews()->avg('rating');
        if($restaurant->contacts){
            \Mapper::map($restaurant->contacts->latitude, $restaurant->contacts->longitude);
        }
        return view('restaurants.show',compact('restaurant','restaurants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = restaurant::where('slug','=',$id)->first();
        return view('restaurants.edit',compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VenuePostRequest $request, $id)
    {
        $restaurant = Restaurant::create($request->all);
        if(!$restaurant){
            return session()->with('error','Restaurant Couldn\'t be updated');
        }
        return session()->with('success','Restaurant updated Sucessfully :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::destroy($id);

        if(!$restaurant){
            return session()->with('error','Restaurant Cannot be Deleted');
        }
        return session()->with('success','Restaurant Deleted Sucessfully :)');
    }
}
