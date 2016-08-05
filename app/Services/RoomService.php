<?php


namespace App\Services;

use App\Http\Requests\PostHotelsRequest;
use App\Http\Requests\PostRoomRequest;
use App\Hotel;

/**
 * Class RoomService
 * @package App\Services
 */
class RoomService
{
    const IMAGE_LOCATION = '/public/uploads/images/rooms/';


    public function make($id,PostRoomRequest $request)
    {
        $restaurant = Hotel::findOrFail($id);
        $restaurant->rooms->create($this->data($request));
        return $restaurant->save();


    }

    public function update($id,PostHotelRequest $request)
    {
        $restaurant = Hotel::findOrFail($id);
        $restaurant->rooms->update($id,$this->data($request));
        return $restaurant->save();


    }


    public function upload(PostRoomRequest $request)
    {
        $file = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(
            base_path() . self::IMAGE_LOCATION, $file
        );
        return $file;
    }

    /**
     * @param PostHotelRequest $request
     * @return array
     */
    protected function data(PostHotelRequest $request)
    {
        return [
            'name' => $request->get('name'),
            'image' => $this->upload($request),
            'description' => $request->get('description'),
            'type' => $request->get('type'),
            'price' => $request->get('price'),
            'number_of_rooms' => $request->get('number_of_rooms'),
            'available_rooms' => $request->get('available_rooms')
        ];
    }

    public function getRoomFirst($slug)
    {
        return Hotel::where('slug',$slug)->with('rooms')->first();
    }
    public function getHotelId($slug)
    {
        return Hotel::select('id')->where('slug',$slug)->first()->id;
    }
    public function getFirstRoom($hotelSlug,$id)
    {
        return Hotel::where('slug',$slug)->with(['rooms'=> function($query) use($id){
                $query->where('id', $id);
      }])->first();
    }
}
