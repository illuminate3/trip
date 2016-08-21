<?php

namespace App\Http\Controllers;
use Auth;
use App\Services\ToursService;
use App\Tour;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\Request\PutTour;

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
        $slug = str_slug($request->get('slug'));
        if(!$this->tourService->make($request)){
            session()->flash('errMsg','Tour Couldn\'t be created');
            return redirect('tours/create')->withInput();
        }
        session()->flash('sucMsg','Tour created Sucessfully :)');
        return redirect('tours/'.$slug.'/contact/create');
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
        if(isset($tour->reviews)){
            $tour->rating = $tour->reviews->avg('rating');
        }
        $tours = Tour::orderBy('updated_at','DES')->take(10);
        if($tour->contacts){
           \Mapper::map($tour->contacts->latitude, $tour->contacts->longitude);
        }
        return view('tours.show',compact('tour','tours'));
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
    public function update(Requests\PutTourRequest $request, $id)
    {
        $slug = str_slug($request->get('slug'));

        if($this->tourService->update($request, $id)){
            session()->flash('sucMsg','Tour Updated');
            return redirect('/profile/business');
        }
        session()->flash('errMsg','Tour couldn\'t be updated');
        return redirect('/tours/'.$slug.'/edit')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        if(!$tour->destroy()){
            session()->flash('errMsg','Tour Cannot be Deleted');
            return redirect('profile/business');
        }
        session()->flash('sucMsg','Tour Deleted Sucessfully :)');
        return redirect('profile/business');
    }
}
