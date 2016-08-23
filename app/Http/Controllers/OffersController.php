<?php

namespace App\Http\Controllers;

class OffersController extends Controller
{
    public function index()
    {
        return view('offers.index');
    }

    public function show($id)
    {
        return view('offers.show')->with([
            'id' => $id
        ]);

    }

    public function edit($id)
    {
        return view('offers.edit')->with([
            'id' => $id
        ]);

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function create()
    {
        return view('offers.create');

    }

    public function destroy()
    {

    }
}
