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
        $hotel = Hotel::where('slug',$slug)->with('rooms')->first();
        return view('rooms/index',compact('hotel','slug'));
    }



    public function create($slug)
    {
        return view('rooms.create',compact('slug'));
    }


    public function store($slug,Requests\PostRoomRequest $request)
    {
        $id = Hotel::select('id')->where('slug',$slug)->first()->id;
        if($this->room->make($id,$request)){
         return redirect('/hotels/'.$slug)->with(['success'=>'Room Created Sucessfully']);
        }
        return redirect('/hotels/'.$slug)->with(['error'=>'Room couldn\'t be created ']);
    }


    public function show($slug,$id)
    {
      $hotel = Hotel::where('slug',$slug)->with(['rooms'=> function($query) use($id){
                $query->where('id', $id);
      }])->first();

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
        $rooms = Hotel::where('slug',$slug)->with(['rooms'=> function($query) use($id){
            $query->where('id', $id);
        }])->first();
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
    public function update(Request $request, $id)
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
