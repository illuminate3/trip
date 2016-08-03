<?php

namespace App\Http\Controllers\Gallery;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Services\GalleryService;
use Illuminate\Http\Request;

use App\Http\Requests;

class HotelsGalleryController extends Controller
{
    protected $galleryService;

    /**
     * GalleriesController constructor.
     *
     * @param $galleryService
     */
    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
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
        $galleries = Hotel::where('slug',$slug)->with('galleries')->first();
        return view('gallery.index',compact('galleries'));
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
        return view('gallery.create',compact('class','model','slug'));
    }


    public function store($slug, Requests\PostGalleryRequest $request)
    {
        $vehicleId= Hotel::select('id')->where('slug',$slug)->first()->id;
        if($this->galleryService->make('hotel',$vehicleId,$request)){
            session()->flash('sucMsg', 'Hotel Gallery created sucessfully');
            return redirect('hotels/'.$slug);
        }
        session()->flash('errMsg','Sorry Hotel Couldn\'t be created');
        return redirect('hotels/'.$slug);
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

        return view('gallery.show',compact('galleries'));
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
