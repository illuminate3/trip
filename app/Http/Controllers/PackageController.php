<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Package;
use App\Services\PackageService;
use App\Services\ToursService;
use App\Tour;

class PackageController extends Controller
{
    protected $package;
    protected $tourService;

    /**
     * PackageController constructor.
     *
     * @param $package
     */
    public function __construct(ToursService $toursService, PackageService $package)
    {
        $this->tourService = $toursService;
        $this->package = $package;
    }


    public function index($slug)
    {
        $tour = Tour::where('slug', $slug)->with('packages')->first();

        return view('packages.index', compact('tour', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $tour = Tour::select('id')->where('slug', $slug)->first();
        return view('packages.create', compact('tour', 'slug'));
    }


    public function store($slug, Requests\PostPackageRequest $request)
    {
        if ($this->package->make($request->get('tour_id'), $request)) {
            session()->flash('sucMsg','Package created');
            return redirect('/tours/' . $slug);
        }
        session()->flash('error','Package couldn\'t be created');
        return redirect('/tours/' . $slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        return view('packages.create')->with([
            'package' => $this->tourService->getPackageById($slug,$id)->first()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug,$id)
    {
        return view('packages.show')->with([
            'package' => $this->tourService->getPackageById($slug,$id)->first
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $request
     * @param $slug
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PutPackageRequest $request, $slug, $id)
    {
        if ($this->package->update($id, $request)) {
            session()->flash('sucMsg', 'Package Updated');
            return redirect();
        }
        session()->flash('sucMsg', 'Package Updated');
        return redirect();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
