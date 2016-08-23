<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Services\GalleryService;
use App\Services\VehiclesService;
use App\Vehicle;
use Illuminate\Http\Request;

/**
 * Class VehiclesGalleryController
 * @package App\Http\Controllers\Gallery
 */
class VehiclesGalleryController extends Controller
{
    /**
     * @var GalleryService
     */
    protected $galleryService;
    /**
     * @var VehiclesService
     */
    protected $vehicleService;
    /**
     * @var string
     */
    protected $model = 'vehicle';

    /**
     * GalleriesController constructor.
     *
     * @param $galleryService
     * @param $vehiclesService
     */
    public function __construct(GalleryService $galleryService, VehiclesService $vehiclesService)
    {
        $this->galleryService = $galleryService;
        $this->vehicleService = $vehiclesService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        return view('gallery.index')->with([
            'galleries' => $this->vehicleService->getSlugWithGalleries($slug)->first(),
            'model' => $this->model,
            'slug' => $slug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('gallery.create')->with([
            'model' => 'vehicle',
            'class' => get_class($this),
            'slug' => $slug
        ]);
    }


    /**
     * @param $slug
     * @param Requests\PostGalleryRequest $request
     */
    public function store($slug, Requests\PostGalleryRequest $request)
    {
        $id = $this->vehicleService->getIdBySlug($slug);
        if($this->galleryService->make($this->model,$id,$request)){
            session()->flash('sucMsg','Gallery information created');
            redirect()->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg','Gallery couldn\'t be created');
        redirect()->route($this->model.'s.{slug}.gallery.index.create',[$slug])->withInput($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        return view('gallery.show')->with([
             'galleries' => $this->vehicleService->getSlugWithGalleries($slug)->first(),
             'id' => $id
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $slug
     * @param  int $gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $gallery)
    {
        return view('gallery.edit')->with([
            'model' => $this->model,
            'id' => $gallery,
            'gallery' => $this->vehicleService->getGallerybyId($slug,$gallery)->first(),
            'slug' => $slug
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PutGalleryRequest $request
     * @param string $slug
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PutGalleryRequest $request,$slug, $id)
    {
        if($this->galleryService->update($id,$request))
        {
            session()->flash('sucMsg','Gallery Updated Sucessfully');
            return redirect()->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg','Gallery couldn\'t be updated');
        return redirect()->route($this->model.'s.{slug}.gallery.edit',[$slug,$id])->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $slug
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {
        if ($this->galleryService->destroy($id)) {
            session()->flash('sucMsg', 'Gallery Deleted');
            return redirect()->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg', 'Gallery couldn\'t be deleted');
        return redirect()->route($this->model.'s.{slug}.gallery.index',[$slug]);
    }
}
