<?php


namespace App\Services;

use Auth;
use Image;
use App\Restaurant;
use App\Http\Requests\PostRestaurantRequest;

/**
 * Class RestaurantsService
 * @package App\Services
 */
class RestaurantsService
{
    const IMAGE_LOCATION = '/public/uploads/images/restaurant/';


    /**
     * @param PostRestaurantRequest $request
     *
     * @return mixed
     */
    public function make(PostRestaurantRequest $request)
    {
        $hotel = new Restaurant();
        $hotel->name = $request->get('name');
        $hotel->slug = str_slug($request->get('slug'));
        $hotel->description = $request->get('description');
        $file = $this->fileUpload($request);
        $hotel->user_id = Auth::user()->id;
        $hotel->logo = $file;
        return $hotel->save();

    }

    public function getRecent()
    {
        return Restaurant::orderBy('created_at', 'DSC')->get();
    }

    /**
     * @param $id
     *
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
     *
     * @return mixed
     */
    public function update($request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->get('name');
        $restaurant->description = $request->get('description');
        if ($request->file('image')) {
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
        $img->save(base_path() . self::IMAGE_LOCATION . $fileName, 80);
        return $fileName;
    }



    public function findByName($name)
    {
        return Restaurant::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    public function findByAddress($address)
    {
        return Restaurant::whereHas('contacts', function ($query) use ($address) {
            return $query->where('address', 'LIKE', '%' . $address . '%');
        })->get();
    }

    public function getSlugAndContactId($slug,$id)
    {
        return Restaurant::where('slug',$slug)->with(['contacts'=>function($query) use ($id){
            return $query->findOrFail($id);
        }]);
    }
    public function getSlugWithContact($slug)
    {
        return Restaurant::where('slug',$slug)->with('contacts');
    }

    public function getIdBySlug($slug)
    {
        return Restaurant::select('id')->where('slug',$slug)->first()->id;
    }

    public function getWithGalleries($slug)
    {
        return Restaurant::where('slug',$slug)->with('galleries');
    }

    public function getGalleryById($slug,$id)
    {
        return Restaurant::where('slug',$slug)->with(['galleries'=>function($query) use ($id){
            return $query->findOrFail($id);
        }]);
    }
}
