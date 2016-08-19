<?php

namespace App\Http\Controllers;

class OffersController extends Controller
{
    public function index()
    {
        return view('offers.index');
    }

    public function show($d)
    {
        return view('offers.show');

    }

    public function edit($id)
    {
        return view('offers.edit');

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
