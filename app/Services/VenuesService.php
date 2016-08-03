<?php


namespace App\Services;

use App\Http\Requests\PostVenueRequest;
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
    public function make(PostVenueRequest $request)
    {
        return Venue::create([
            'name' => $request->get('name'),
            'slug' => str_replace(" ", "-", strtolower($request->get('name'))),
            'description' => $request->get('description'),
            'logo' => $this->fileUpload($request)
        ]);
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
    public function fileUpload(PostVenueRequest $request)
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
}
