<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PostRoomRequest;
use App\Services\RoomService;
use App\Services\HotelsService;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    protected $room;
    protected $hotel;

    public function __construct(RoomService $room,HotelsService $hotel)
    {
        $this->room = $room;
        $this->hotel= $hotel;
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
        return view('rooms/index', compact('hotel', 'slug'));
    }


    public function create($slug)
    {
        return view('rooms.create', compact('slug'));
    }


    public function store($slug, Requests\PostRoomRequest $request)
    {
        $id = $this->room->getHotelId($slug);
        if ($this->room->make($id, $request)) {
            session()->flash('sucMsg', 'Room Created Sucessfully');
            return redirect('/hotels/' . $slug . '/room');
        }
        session()->flash('errMsg', 'Room couldn\'t be created ');
        return redirect('/hotels/' . $slug . '/room/create')->withInput();
    }


    public function show($slug, $id)
    {
        $hotel = $this->room->getFirstRoom($slug, $id);
        return view('rooms.show', compact('hotel', 'slug'));
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
        $rooms = $this->room->getFirstRoom($slug, $id);
        $room = $rooms->rooms->first();
        return view('rooms.edit', compact('room', 'slug', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostRoomRequest $request, $slug, $id)
    {
        $hotelId = $this->hotel->getIdBySlug($slug);
        if($this->room->update($hotelId,$id,$request)){
            session()->flash('sucMsg','Room Updated Sucessfully');
            return redirect('hotels/'.$slug);
        }
        session()->flash('errMsg','Room couldn\'t be updated');
        return redirect('hotels/'.$slug.'/room/'.$id)->withInput($request->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug,$id)
    {

    }
}
