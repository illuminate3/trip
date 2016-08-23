<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Services\GalleryService;
use App\Services\RestaurantsService;
use Illuminate\Http\Request;

use App\Http\Requests;

class RestaurantsGalleryController extends Controller
{
    protected $galleryService;
    protected $restaurantService;
    protected $model = 'restaurant';

    /**
     * GalleriesController constructor.
     *
     * @param $galleryService
     */
    public function __construct(GalleryService $galleryService,RestaurantsService $restaurantsService)
    {
        $this->galleryService = $galleryService;
        $this->restaurantService = $restaurantsService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }

    public function index($slug)
    {
        return view('gallery.index')->with([
            'galleries' => $this->restaurantService->getWithGalleries($slug)->first(),
            'model' => $this->model,
            'slug' => $slug
        ]);

    }


    public function create($slug)
    {
        return view('gallery.create')->with([
            'class' => get_class($this),
            'model' => $this->model,
            'slug' => $slug
        ]);
    }


    public function store($slug, Requests\PostGalleryRequest $request)
    {
        $id= $this->restaurantService->getIdBySlug($slug);
        if($this->galleryService->make($this->model,$id,$request)){
            session()->flash('sucMsg','Gallery information created');
            return redirect()->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg','Gallery couldn\'t be created');
        return redirect()->route($this->model.'s.{slug}.gallery.create',[$slug])
            ->withInput($request->toArray());
    }


    public function show($slug,$id)
    {
        return view('gallery.show')->with([
            'galleries' => $this->restaurantService->getWithGalleries($slug)->first(),
            'id' => $id
        ]);
    }

    public function edit($slug,$gallery)
    {
        return view('gallery.edit')->with([
            'model' => $this->model,
            'gallery' => $this->restaurantService->getGalleryById($slug,$gallery)->first(),
            'id' => $gallery,
            'slug' => $slug
        ]);
    }


    public function update(Requests\PutGalleryRequest $request,$slug, $id)
    {
        if($this->galleryService->update($id,$request))
        {
            session()->flash('sucMsg','Gallery Updated');
            return redirect()->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg','Gallery couldn\'t be updated');
        return redirect()->route($this->model.'s.{slug}.gallery.edit',[$slug,$id])
            ->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $id)
    {
        if($this->galleryService->destroy($id))
        {
            session()->flash('sucMsg','Gallery Deleted');
            return redirect()->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg','Gallery couldn\'t be deleted');
        return redirect()->route($this->model.'s.{slug}.gallery.index',[$slug]);

    }
}
