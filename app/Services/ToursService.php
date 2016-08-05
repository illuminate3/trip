<?php


namespace App\Services;

use App\Http\Requests\PostTourRequest;
use App\Http\Requests\PutTourRequest;
use App\Tour;
use Image;
use Auth;
/**
 * Class ToursService
 * @package App\Services
 */
class ToursService
{

    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/tour/';

    /**
     * @param PostTourRequest $request
     * @return mixed
     */
    public function make(PostTourRequest $request)
    {
        $tour = new Tour();
        $tour->name = $request->get('name');
        $tour->slug = str_replace(" ", "-", strtolower($request->get('slug')));
        $tour->description = $request->get('description');
        $file = $this->fileUpload($request);
        $tour->logo = $file;
        return $tour->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function approve($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->status = 1;
        return $tour->save();
    }

    /**
     * @param $id
     * @param PostTourRequest $request
     * @return mixed
     */
    public function update( PutTourRequest $request,$id)
    {
        $tour = Tour::findOrFail($id);
        $tour->name = $request->get('name');
        $tour->slug = str_replace(" ", "-", strtolower($request->get('slug')));
        $tour->description = $request->get('description');
        if($request->file('image')){
            $file = $this->fileUpload($request);
            $tour->logo = $file;
        }
        return $tour->save();
    }


    public function fileUpload($request)
    {
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        // open an image file
        $img = Image::make($file)->resize(350, 200);;
        // Saving the file to filesystem
        $img->save( base_path().self::IMAGE_LOCATION . $fileName, 80);
        return $fileName;
    }
    public function generateSlug($data)
    {
        return str_replace(" ", "-", strtolower($data));
    }
}
