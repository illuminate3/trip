<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewslettersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newsletter.index')->with([
            'newsletters' => Newsletter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newsletter = Newsletter::create([
            'name' => $request->get('name'),
            'email' => $request->get('email')
           ]);
        if($newsletter)
        {
            session()->flash('sucMsg','Newsletter subscribed');
            return redirect('/');
        }
        session()->flash( 'errMsg', "Newsletter couldn't be subscribed");
        return redirect('/');
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
        return view('newsletter.show')->with([
            'newsletter' => Newsletter::findOrFail($id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('newsletter.edit')->with([
            'newsletter' => Newsletter::findOrFail($id)
        ]) ;
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
        $newsletter = Newsletter::findOrFail($id);
        $data = [
          'name' => $request->get('name'),
            'email' => $request->get('email')
        ];
        if($newsletter->update($data))
        {
            session()->flash('sucMsg','Newsletter Updated');
            return redirect('/');
        }
        session()->flash('errMsg','Newsletter couldn\'t be Updated');
        return redirect()->back()->withInput($request->toArray());
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
        $newsletter = Newsletter::findOrFail($id);
        if($newsletter->delete())
        {
            session()->flash('sucMsg','Newsletter Deleted');
            return redirect()->back();
        }
        session()->flash('errMsg','Newsletter couldn\'t be deleted');
        return redirect()->back();

    }
}
