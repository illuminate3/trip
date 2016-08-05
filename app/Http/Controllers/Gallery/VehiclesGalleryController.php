<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Services\GalleryService;
use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;

class VehiclesGalleryController extends Controller
{
    protected $galleryService;
    protected $model = 'vehicle';

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
        $galleries = Vehicle::where('slug',$slug)->with('galleries')->first();
        $model = $this->model;
        return view('gallery.index',compact('galleries','model','slug'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $class = get_class($this);
        $model = 'vehicle';
        return view('gallery.create',compact('class','model','slug'));
    }


    public function store($slug, Requests\PostGalleryRequest $request)
    {
        $vehicleId= Vehicle::select('id')->where('slug',$slug)->first()->id;
        if($this->galleryService->make('vehicle',$vehicleId,$request)){
            exit('done');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        $galleries = Vehicle::where('slug',$slug)->with('galleries')->first();
        dd($galleries);
        return views('gallery.show',compact('galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$gallery)
    {
        $model = $this->model;
        $id = $gallery;
        $gallery = Vehicle::where('slug',$slug)->with(['galleries'=>function($query) use ($id){
            return $query->findOrFail($id);
        }])->first();
        
        return view('gallery.edit',compact('gallery','slug','model','id'));
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
