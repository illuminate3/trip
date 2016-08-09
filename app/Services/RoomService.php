<?php


namespace App\Services;

use App\Http\Requests\PostHotelsRequest;
use App\Http\Requests\PostRoomRequest;
use App\Hotel;
use Image;
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
        return $restaurant->rooms->create($this->data($request));
    }

    public function update($id,PostHotelRequest $request)
    {
        $restaurant = Hotel::findOrFail($id);
        return $restaurant->rooms->update($id,$this->data($request));
    }

    public function fileUpload($request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        // open an image file
        $img = Image::make($file)->resize(350, 200);;
        // Saving the file to filesystem
        $img->save( base_path().self::IMAGE_LOCATION . $fileName,80);
        return $fileName;
    }

    public function data($request)
    {
        return [
            'name' => $request->get('name'),
            'image' => $this->fileUpload($request),
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
