<?php

namespace App\Http\Controllers;

use App\Carousel;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\CarouselService;
use App\Http\Requests\PostCarouselRequest;

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
        $carousel = Carousel::findOrFail($id)->first();
        return view('carousel.edit', compact('carousel'));
    }

    public function store(PostCarouselRequest $request)
    {
      if($this->carousel->make($request)){
        session()->with('sucMsg','Carousel created Sucessfully');
        return redirect('dash/carousels');
      }
      session()->flash('errMsg','Carousel couldn\'t be created');
      return redirect('dash/carousel/create')->old($request);
    }
    public function update($id)
    {
        $carousel = Carousel::findOrFail($id);
        dd($carousel);
    }

    public function show($id)
    {
        $carousel = Carousel::findOrFail($id)->first();
        return view('carousel.show', compact('carousel'));
    }

    public function destroy($id)
    {
        $carousel = Carousel::delete($id);
    }
}
