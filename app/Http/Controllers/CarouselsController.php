<?php

namespace App\Http\Controllers;

use App\Carousel;
use App\Http\Requests\PostCarouselRequest;
use App\Http\Requests\PutCarouselRequest;
use App\Services\CarouselService;

class CarouselsController extends Controller
{
    protected $carousel;

    public function __construct(CarouselService $carousel)
    {
        $this->carousel = $carousel;
    }

    public function index()
    {
        $carousels = Carousel::all();
        return view('carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('carousel.create');
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);

        return view('carousel.edit', compact('carousel'));
    }

    public function store(PostCarouselRequest $request)
    {
        if ($this->carousel->make($request)) {
            session()->flash('sucMsg', 'Carousel created Sucessfully');
            return redirect('dash/carousel');
        }
        session()->flash('errMsg', 'Carousel couldn\'t be created');
        return redirect('dash/carousel/create')->withInput($request->toArray());
    }

    public function update($id,PutCarouselRequest $request)
    {
        if($this->carousel->update($id,$request))
        {
            session()->flash('sucMsg','Carousel Updated Sucessfully');
            return redirect('/dash/carousel');
        }
        session()->flash('errMsg','Carousel couldn\'t be updated. Try again');
        return redirect('/dash/carousel/'.$id.'/edit')->withInput($request->toArray());
        
    }

    public function show($id)
    {
        $carousel = Carousel::findOrFail($id)->first();
        return view('carousel.show', compact('carousel'));
    }

    public function destroy($id)
    {
        if($this->carousel->destroyWithResource($id))
        {
            session()->flash('sucMsg','Carousel deleted sucessfully');
            return route('dash.carousel.index');
        }
        session()->flash('errMsg','Carousel couldn\'t be deleted');
        return route('dash.carousel.index');
    }
}
