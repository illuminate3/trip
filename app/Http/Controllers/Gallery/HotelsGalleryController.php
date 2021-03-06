<?php

namespace App\Http\Controllers\Gallery;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Services\GalleryService;
use App\Services\HotelsService;
use Illuminate\Http\Request;

use App\Http\Requests;

class HotelsGalleryController extends Controller
{
    protected $galleryService;
    protected $model = 'hotel';
    protected $hotelService;
    /**
     * GalleriesController constructor.
     *
     * @param $galleryService
     * @param $hotelsService
     */
    public function __construct(GalleryService $galleryService,HotelsService $hotelsService)
    {
        $this->galleryService = $galleryService;
        $this->hotelService = $hotelsService;
        $this->middleware('auth', ['except' => [
            'index', 'show'
        ]]);
    }
    /**
     * Display a listing of the resource.
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        return view('gallery.index')->with([
            'galleries' => $this->hotelService->getGalleriesBySlug($slug)->first(),
            'model' => $this->model,
            'slug' => $slug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
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
        $id= $this->hotelService->getIdBySlug($slug);
        if($this->galleryService->make($this->model,$id,$request)){
            session()->flash('sucMsg', 'Hotel gallery created');
            return redirect()
                ->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg','Gallery for hotel couldn\'t be created');
        return redirect()
            ->route($this->model.'s.{slug}.gallery.create',[$slug])
            ->withInput($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        return redirect()->route($this->model.'s.{slug}.gallery.index')->with(['slug' => $slug, 'id' =>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @param  int  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$gallery)
    {
        return view('gallery.edit')->with([
            'model' => $this->model,
            'id' => $gallery,
            'gallery' => $this->hotelService->getGalleryById($slug,$gallery)->first(),
            'slug' => $slug
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PutGalleryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PutGalleryRequest $request,$slug, $id)
    {
        if($this->galleryService->update($id,$request)){
            session()->flash('sucMsg','Gallery information updated');
            return redirect()
                ->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg','Gallery information couldn\'t be updated');
        return redirect()
            ->route($this->model.'s.{slug}.gallery.edit',[$slug,$id])
            ->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     * @param string $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {
        if($this->galleryService->destroy($id))
        {
            session()->flash('sucMsg','Gallery Deleted');
            return redirect()
                ->route($this->model.'s.{slug}.gallery.index',[$slug]);
        }
        session()->flash('errMsg','Gallery couldn\'t be deleted');
        return redirect()
            ->route($this->model.'s.{slug}.gallery.index',[$slug]);

    }
}
