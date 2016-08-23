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
     *
     * @return mixed
     */
    public function make(PostVenueRequest $request, $user_id = 0)
    {
        $hotel = new Venue();
        $hotel->name = $request->get('name');
        $hotel->slug = str_slug($request->get('slug'));
        $hotel->description = $request->get('description');
        $file = $this->fileUpload($request);
        $hotel->user_id = Auth::user()->id;
        $hotel->logo = $file;
        return $hotel->save();
    }

    public function update(PutVenueRequest $request, $id)
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
     * @param $id
     *
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
     *
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
        $img->save(base_path() . self::IMAGE_LOCATION . $fileName);
        return $fileName;
    }


    public function findByName($name)
    {
        return Venue::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    public function findByAddress($address)
    {
        return Venue::whereHas('contacts', function ($query) use ($address) {
            return $query->where('address', 'LIKE', '%' . $address . '%');
        })->get();
    }

    public function findByLatLong($latitude, $longitude)
    {
        return Venue::whereHas('contacts', function ($query) use ($latitude, $longitude) {
            return $query->where('latitude', 'LIKE', '%' . $latitude . '%')
                ->where('longitude', 'LIKE', '%' . $longitude . '%');
        })->get();
    }

    public function getIdBySlug($slug)
    {
        return Venue::select('id')->where('slug', $slug)->first()->id;
    }

    public function getSlugAndContactId($slug, $id)
    {
        return Venue::where('slug', $slug)->with(['contacts' => function ($query) use ($id) {
            return $query->findOrFail($id);
        }]);
    }

    public function getSlugWithContact($slug)
    {
        return Venue::where('slug', $slug)->with('contacts');
    }

    public function getGalleryById($slug,$id)
    {
        return Venue::where('slug',$slug)->with(['galleries'=>function($query) use ($id){
            return $query->findOrFail($id);
        }]);
    }

    public function getGalleriesBySlug($slug)
    {
        return Venue::where('slug',$slug)->with('galleries');
    }
}
