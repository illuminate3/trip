<?php

namespace App\Http\Controllers\Gallery;


use App\Http\Controllers\Controller;
use App\Services\GalleryService;
use App\Services\VenuesService;
use App\Venue;
use Illuminate\Http\Request;
use App\Http\Requests;

class VenuesGalleryController extends Controller
{
    protected $galleryService;
    protected $venueService;
    protected $model = 'venue';

    /**
     * GalleriesController constructor.
     *
     * @param $galleryService
     */
    public function __construct(GalleryService $galleryService,VenuesService $venuesService)
    {
        $this->galleryService = $galleryService;
        $this->venueService = $venuesService;
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
            'galleries' => $this->venueService->getGalleriesBySlug($slug)->first(),
            'model' => $this->model,
            'slug' => $slug
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
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


    public function store(Requests\PostGalleryRequest $request,$slug)
    {
        $id =$this->venueService->getIdBySlug($slug);
        if($this->galleryService->make($this->model,$id,$request)){
            session()->flash('sucMsg','Gallery information created');
            return redirect($this->model.'s/'.$slug.'/gallery');
        }
        session()->flash('errMsg','Gallery couldn\'t be created');
        return redirect($this->model.'s/'.$slug.'/galllery');
    }

    /**
     * Display the specified resource.
     * @param string $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        return view('gallery.show')->with([
            'galleries' => $this->venueService->getGalleriesBySlug($slug)->first(),
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $slug
     * @param  int  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$gallery)
    {
        return view('gallery.edit')->with([
            'model' => $this->model,
            'id' => $gallery,
            'gallery' =>$this->venueService->getGalleryById($slug,$gallery)->first(),
            'slug' => $slug
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PutGalleryRequest  $request
     * @param string $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PutGalleryRequest $request, $slug, $id)
    {
        if($this->galleryService->update($id,$request))
        {
            session()->flash('sucMsg','Gallery Updated Sucessfully');
            redirect($this->model.'s/'.$slug.'/gallery');
        }
        session()->flash('errMsg','Gallery couldn\'t be updated');
        redirect($this->model.'s/'.$slug.'/gallery/'.$id.'/edit')->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $slug The slug of venue
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {
        if ($this->galleryService->destroy($id)) {
            session()->flash('sucMsg', 'Gallery Deleted');
            return redirect($this->model . 's/' . $slug . '/gallery/');
        }
        session()->flash('errMsg', 'Gallery couldn\'t be deleted');
        return redirect($this->model . 's/' . $slug . '/gallery/');
    }
}
