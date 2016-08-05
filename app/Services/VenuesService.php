<?php


namespace App\Services;

use App\Http\Requests\PostVenueRequest;
use App\Http\Requests\PutVenueRequest;
use App\Venue;
use Auth;
use Image;

/**
 * Class VenuesService
 * @package App\Services
 */
class VenuesService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/venue/';

    /**
     * @param PostVenueRequest $request
     * @return mixed
     */
    public function make(PostVenueRequest $request, $user_id = 0)
    {
        $hotel = new Venue();
        $hotel->name = $request->get('name');
        $hotel->slug = $this->generateSlug($request->get('slug'));
        $hotel->description = $request->get('description');
        $file = $this->fileUpload($request);
        $hotel->user_id = Auth::user()->id;
        $hotel->logo = $file;
        return $hotel->save();
    }

   public function update(PutVenueRequest $request,$id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->get('name');
        $restaurant->slug = $this->generateSlug($request->get('slug'));
        $restaurant->description = $request->get('description');
        if($request->file('image')){
            $file1 = $this->fileUpload($request);
            $restaurant->image = $file1;
        }
        return $restaurant->save();
    }
    /**
     * @param $id
     * @return mixed
     */
    public function approve($id)
    {
        $venue = Venue::findOrFail($id);
        $venue->status = 1;
        return $venue->save();
    }

    /**
     * @param PostVenueRequest $request
     * @return mixed
     */
    public function fileUpload($request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $img = Image::make($file);
        // Resize Image
        $img->resize(350, 200);

        // Saving the file to filesystem
        $img->save(base_path().self::IMAGE_LOCATION . $fileName);
        return $fileName;
    }
    public function generateSlug($data)
    {
        return str_replace(" ", "-", strtolower($data));
    }

}
