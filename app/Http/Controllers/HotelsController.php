<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\HotelsService;


/**
 * Class HotelsController
 * @package App\Http\Controllers
 */
class HotelsController extends Controller
{
    protected $hotelsService;

    /**
     * HotelsController constructor.
     * @param $hotelsService
     */
    public function __construct(HotelsService $hotelsService)
    {
        $this->hotelsService = $hotelsService;
        $this->middleware('auth', ['except' => [
            'index', 'show','destroy'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = $this->hotelsService->getLatestHotels();

        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotels.create');
    }



    public function store(Requests\PostHotelRequest $request)
    {
         $hotel = $this->hotelsService->make($request);
         if(!$hotel){
            return redirect('hotels')->with('error','Hotel Couldn\'t be created');
        }
        return redirect('hotels')->with('success','Hotel created Sucessfully :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $hotel = $this->hotelsService->getSlug($slug);
        $hotel->rating = $hotel->reviews->avg('rating');
        $hotels = $this->hotelsService->getSimilarHotels();
        if($hotel->contacts){
          \Mapper::map($hotel->contacts->latitude, $hotel->contacts->longitude);
        }
        return view('hotels.show',compact('hotel','hotels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = $this->hotelsService->findSlug($id);
        return view('hotels.edit',compact('hotel'));
    }


    /**
     * @param VenuePostRequest $request
     * @param $id
     * @return mixed
     */
    public function update(Requests\PutHotelsRequest $request, $id)
    {
        $hotel = $this->hotelsService->update($request,$id);
        if(!$hotel){
            return redirect('hotels')->with('error','Hotel Couldn\'t be updated');
        }
        return redirect('hotels')->with('success','Hotel updated Sucessfully :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::destroy($id);

        if(!$hotel){
            return redirect('hotels')->with(['error' => 'Hotel Cannot be Deleted']);
        }
        return redirect('hotels')->with(['success' => 'Hotel Deleted Sucessfully :)']);
    }
}
