<?php


namespace App\Services;

use App\Gallery;
use App\Hotel;
use App\Http\Requests\PostGalleryRequest;
use App\Http\Requests\PutGalleryRequest;
use App\Restaurant;
use App\Tour;
use App\Vehicle;
use App\Venue;
use Image;

/**
 * Class RoomService
 * @package App\Services
 */
class GalleryService
{
    const IMAGE_LOCATION = '/public/uploads/images/gallery/';


    public function make($model, $id, PostGalleryRequest $request)
    {
        return $this->createGallery($model, $id, $this->data($request));
    }

    public function update($id, PostGalleryRequest $request)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->rooms->update($id, $this->data($request));
        return $gallery->save();


    }

    /**
     * @param PostGalleryRequest $request
     *
     * @return array
     */
    protected function data(PostGalleryRequest $request)
    {
        return [
            'title' => $request->get('title'),
            'image' => $this->fileUpload($request),
            'description' => $request->get('description'),
        ];
    }

    public function createGallery($model, $id, $data)
    {
        switch ($model) {
            case "restaurant":
                $gallery = Restaurant::findOrFail($id);
                return $gallery->galleries()->create($data);
                break;
            case "hotel":
                $gallery = Hotel::findorFail($id);
                return $gallery->galleries()->create($data);
                break;
            case "venue":
                $gallery = Venue::findOrFail($id);
                return $gallery->galleries()->create($data);
                break;
            case "tour":
                $gallery = Tour::findOrFail($id);
                return $gallery->galleries()->create($data);
                break;
            case "vehicle":
                $gallery = Vehicle::findOrFail($id);
                return $gallery->galleries()->create($data);
                break;
            case "package":
                $gallery = Package::findOrFail($id);
                return $gallery->galleries()->create($data);
                break;
            default:
                exit('Sorry bro');
                return back()->with(['error' => 'No correct model can be found to insert ']);
                break;

        }
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
        $imgTh = Image::make($file)->resize(350, 200);;
        $img = Image::make($file)->resize(1024, 768);;
        // Saving the file to filesystem
        $imgTh->save(base_path() . self::IMAGE_LOCATION . 'th_' . $fileName, 80);
        $img->save(base_path() . self::IMAGE_LOCATION . $fileName, 80);

        //session()->flash('gallery.upload','Image Uploaded Sucessfully');
        return $fileName;

    }

}
