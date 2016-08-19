<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Package;
use App\Services\PackageService;
use App\Tour;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected $package;

    /**
     * PackageController constructor.
     *
     * @param $package
     */
    public function __construct(PackageService $package)
    {
        $this->package = $package;
    }


    public function index($slug)
    {
        $tour = Tour::where('slug', $slug)->with('packages')->first();
        dd($tour->packages);
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
            return redirect('/tours/' . $slug)->with(['success' => 'Package Created Sucessfully']);
        }
        return redirect('/tours/' . $slug)->with(['error' => 'Error While Creating Package']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id)->first();
        return view('packages.show', compact('package'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        $tour = Tour::where('slug', $slug)->with(['packages' => function ($query) {
            $query->packages();
        }])->first();
        return view('packages.create', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
