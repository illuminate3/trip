<?php


namespace App\Services;

use App\Http\Requests\PostRestaurantsRequest;
use App\Http\Requests\PostRoomRequest;
use App\Restaurant;

/**
 * Class RoomService
 * @package App\Services
 */
class RoomService
{
    const IMAGE_LOCATION = '/public/uploads/images/rooms/';


    public function make($id,PostRoomRequest $request)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->rooms->create($this->data($request));
        return $restaurant->save();


    }

    public function update($id,PostRestaurantRequest $request)
    {
        $restaurant = Restaurant::findOrFail($id);
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
     * @param PostRestaurantRequest $request
     * @return array
     */
    protected function data(PostRestaurantRequest $request)
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
}
