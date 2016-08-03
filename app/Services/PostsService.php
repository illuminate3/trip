<?php
namespace App\Services;

use App\Hotel;
use App\Http\Requests\PostHotelRequest;
use Auth;
use Image;

/**
 * Class HotelsService
 * @package App\Services
 */
class PostsService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/posts/';

    /**
     * @param PostHotelRequest $request
     *
     * @return bool
     */
    public function make(PostHotelRequest $request)
    {
        $hotel = new Hotel();
        $hotel->name = $request->get('name');
        $hotel->slug = str_replace(" ", "-", strtolower($request->get('name')));
        $hotel->description = $request->get('description');
        $file = $this->fileUpload($request);
        $hotel->user_id = Auth::user()->id;
        $hotel->logo = $file;
        return $hotel->save();
    }

    /**
     * @param $request
     * @param $id
     *
     * @return mixed
     */
    public function update($request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->name = $request->get('name');
        $hotel->slug = str_replace(" ", "-", strtolower($request->get('name')));
        $hotel->description = $request->get('description');
        $file = $this->fileUpload($request);
        $hotel->user_id = Auth::user()->id;
        $hotel->logo = $file;
        return $hotel->save();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function approve($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->status = 1;
        return $hotel->save();
    }

    /**
     * @param PostHotelRequest $request
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
