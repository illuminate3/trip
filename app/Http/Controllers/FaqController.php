<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::all();
        return view('faq.index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faq.create');
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
        $faq = Faq::create([
            'question' => $request->get('question'),
            'answer' => $request->get('answer'),
            'order' => $request->get('order'),
            'status' => $request->get('status')
            ]);
        if($faq){
            session()->flash('sucMsg','New faq sucessfully created');
            return redirect('/dash/faq/');
        }
        session()->flash('errMsg','Faq couldn\'t be sucessfully created');
        return redirect('/dash/faq/');
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
        $faq = Faq::findOrFail($id)->first();
        return view('faq.show',compact('faq'));
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
        $faq = Faq::findOrFail($id)->first();
        return view('faq.edit',compact('faq'));
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
        $faq = Faq::findOrFail($id);
        $faq->question = $request->get('question');
        $faq->answer = $request->get('answer');
        $faq->order = $request->get('order');
        $faq->status = $request->get('status');
        if($faq->save())
        {
            session()->flash('sucMsg','Faq Updated Sucessfully');
            return redirect('dash/faq');
        }
        session()->flash('errMsg','Faq couldn\'t be updated');
        return redirect('dash/faq/'.$id.'/edit')->withInput($request->toArray());

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
        $faq = Faq::findOrfail($id);
        if($faq->delete())
        {
          session()->flash('sucMsg','Faq Deleted Sucessfully');
            return redirect('dash/faq');
        }
        session()->flash('errMsg','Faq couldn\'t be deleted');
        return redirect('dash/faq/');
    }
}
