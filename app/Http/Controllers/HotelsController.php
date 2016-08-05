<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\HotelsService;
use Auth;
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
        $slug = $this->hotelsService->generateSlug($request->get('slug'));
        $hotel = $this->hotelsService->make($request);
        if(!$hotel){
            session()->with('errMsg','Hotel Couldn\'t be created');
            return redirect('hotels/create')->withInput();
        }
        session()->with('sucMsg','Hotel created Sucessfully');
        return redirect('hotels/'.$slug.'/contact/create');
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
        if(isset($hotel->reviews)){
            $hotel->rating = $hotel->reviews->avg('rating');
        }
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
        $slug = $this->hotelsService->generateSlug($request->get('slug'));
        if(!$hotel){
            session()->flash('errMsg','Hotel Couldn\'t be updated');
            return redirect('hotels/'.$slug.'/edit');
        }
        session()->flash('sucMsg','Hotel updated Sucessfully :)');
        return redirect('profile/business');
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
            session()->flash('errMsg', 'Hotel Cannot be Deleted');
            return redirect('profile/business');
        }
        session()->flash('sucMsg', 'Hotel Deleted Sucessfully :)');
        return redirect('profile/business');
    }
}
