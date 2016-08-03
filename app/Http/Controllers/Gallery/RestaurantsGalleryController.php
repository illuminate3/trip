<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Services\GalleryService;
use Illuminate\Http\Request;

use App\Http\Requests;

class RestaurantsGalleryController extends Controller
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

    public function index($slug)
    {
        $galleries = Restaurant::where('slug',$slug)->with('galleries')->first();
        return view('gallery.index',compact('galleries'));
    }


    public function create($slug)
    {
        $class = get_class($this);
        $model = 'restaurant';
        return view('gallery.create',compact('class','model','slug'));
    }


    public function store($slug, Requests\PostGalleryRequest $request)
    {
        $vehicleId= Restaurant::select('id')->where('slug',$slug)->first()->id;
        if($this->galleryService->make('restaurant',$vehicleId,$request)){
            exit('done');
        }
    }


    public function show($slug,$id)
    {
        $galleries = Restaurant::where('slug',$slug)->with('galleries')->first();
        dd($galleries);
        return view('gallery.show',compact('galleries'));
    }

    public function edit($slug,$id)
    {
        $class = get_class($this);
        $model = 'restaurant';
        return view('gallery.create',compact('class','model','slug'));
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
