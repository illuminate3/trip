<?php


namespace App\Services;

use App\Restaurant;
use App\Http\Requests\PostRestaurantRequest;
use Image;
/**
 * Class RestaurantsService
 * @package App\Services
 */
class RestaurantsService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/restaurant';

    /**
     * @param PostRestaurantRequest $request
     * @return mixed
     */
    public function make(PostRestaurantRequest $request)
    {
        return Restaurant::create([
            'name' => $request->get('name'),
            'slug' => str_replace(" ", "-", strtolower($request->get('name'))),
            'description' => $request->get('description'),
            'logo' => $this->fileUpload($request),
            ]);
        
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
     * @param $id
     * @param PostRestaurantRequest $request
     * @return mixed
     */
    public function update($id, PostRestaurantRequest $request)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->get('name');
        $restaurant->slug = str_replace(" ", "-", strtolower($request->get('name')));
        $restaurant->description = $request->get('description');
        $file1 = $this->fileUpload($request);
        $restaurant->image = $file1;
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

}
