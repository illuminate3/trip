<?php


namespace App\Services;

use App\Restaurant;
use App\Http\Requests\PostRestaurantRequest;
use App\Http\Requests\PutRestaurantRequest;
use Image;
use Auth;
/**
 * Class RestaurantsService
 * @package App\Services
 */
class RestaurantsService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/restaurant/';

    /**
     * @param PostRestaurantRequest $request
     * @return mixed
     */
    public function make(PostRestaurantRequest $request)
    {
        $hotel = new Restaurant();
        $hotel->name = $request->get('name');
        $hotel->slug = $this->generateSlug($request->get('slug'));
        $hotel->description = $request->get('description');
        $file = $this->fileUpload($request);
        $hotel->user_id = Auth::user()->id;
        $hotel->logo = $file;
        return $hotel->save();
        
    }

    public function getRecent()
    {
        return Restaurant::orderBy('created_at','DSC')->get();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function approve($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->status = 1;
        return $restaurant->save();
    }

    /**
     * @param PostRestaurantRequest $request
     * @param $id
     * @return mixed
     */
    public function update($request,$id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->get('name');
        $restaurant->slug = $this->genrateSlug($request->get('slug'));
        $restaurant->description = $request->get('description');
        if($request->file('image')){
            $file1 = $this->fileUpload($request);
            $restaurant->image = $file1;
        }
        return $restaurant->save();
    }
    

   /**
     * @param  $request
     *
     * @return mixed
     */
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
    public function generateSlug($data)
    {
        return str_replace(" ", "-", strtolower($data));
    }

}
