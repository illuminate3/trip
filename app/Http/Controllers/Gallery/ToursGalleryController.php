<?php

namespace App\Http\Controllers\Gallery;

use App\Services\ToursService;
use App\Tour;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\GalleryService;
use App\Http\Controllers\Controller;

class ToursGalleryController extends Controller
{
    protected $galleryService;
    protected $tourService;
    protected $model = 'tour';

    /**
     * GalleriesController constructor.
     *
     * @param $galleryService
     */
    public function __construct(GalleryService $galleryService,ToursService $toursService)
    {
        $this->galleryService = $galleryService;
        $this->tourService = $toursService;
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
        return view('gallery.index')->with(
            [
                'galleries' => $this->tourService->getGalleriesBySlug($slug)->first(),
                'model' => $this->model,
                'slug' => $slug
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     * @param string $slug The Slug of Tour
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        return view('gallery.create')->with([
            'model' => $this->model,
            'slug' => $slug,
            'class' => get_class($this)
        ]);
    }


    public function store($slug, Requests\PostGalleryRequest $request)
    {
        $id= $this->tourService->getIdBySlug($slug);
        if($this->galleryService->make($this->model,$id,$request)){
            session()->flash('sucMsg','Gallery information created');
            return redirect($this->model.'s/'.$slug.'/galllery');
        }
        session()->flash('errMsg','Gallery couldn\'t be created');
        return redirect($this->model.'s/'.$slug.'/galllery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        $galleries = $this->tourService->getGalleriesBySlug($slug)->first();

        return view('gallery.show',compact('galleries'));
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
            'gallery' => $this->tourService->getGalleryById($slug,$gallery)->first(),
            'model' => $this->model,
            'id' => $gallery,
            'slug' => $slug
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PutGalleryRequest  $request
     * @param  string $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PutGalleryRequest $request,$slug, $id)
    {
        if($this->galleryService->update($id,$request))
        {
            session()->flash('sucMsg','Gallery Updated');
            return redirect($this->model.'s/'.$slug.'/gallery');
        }
        session()->flash('errMsg','Gallery couldn\'t be updated');
        return redirect($this->model.'s/'.$slug.'/gallery/'.$id.'/edit')->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $slug
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
