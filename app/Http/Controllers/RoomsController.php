<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use App\Hotel;
use App\Http\Requests;
use App\Services\RoomService;

class RoomsController extends Controller
{
    protected  $room;

    public function __construct(RoomService $room)
    {
        $this->room = $room;
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
        $hotel = $this->room->getRoomFirst($slug);
        return view('rooms/index',compact('hotel','slug'));
    }



    public function create($slug)
    {
        return view('rooms.create',compact('slug'));
    }


    public function store($slug,Requests\PostRoomRequest $request)
    {
        $id = $this->room->getHotelId($slug);
        if($this->room->make($id,$request)){
            session()->flash('sucMsg','Room Created Sucessfully');
            return redirect('/hotels/'.$slug.'/room');
        }
        session()->flash('errMsg','Room couldn\'t be created ');
        return redirect('/hotels/'.$slug.'/room/create')->withInput();
    }


    public function show($slug,$id)
    {
      $hotel = $this->room->getFirstRoom($slug,$id);
      return view('rooms.show',compact('hotel','slug'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        $rooms = $this->room->getFirstRoom($slug,$id);
        $room = $rooms->rooms->first();
        return view('rooms.edit',compact('room','slug','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$slug, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
