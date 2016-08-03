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
        $hotels = Hotel::with('contacts','galleries')->orderBy('updated_at','DES')->get();

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

        $hotel = Hotel::where('slug','=',$slug)->with('contacts','galleries','reviews')->first();
        $hotels = Hotel::with('contacts')->take(10);
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
        $hotel = Hotel::where('slug','=',$id)->first();
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
