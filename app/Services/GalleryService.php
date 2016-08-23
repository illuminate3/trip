<?php


namespace App\Services;

use App\Gallery;
use App\Hotel;
use App\Restaurant;
use App\Tour;
use App\Vehicle;
use App\Venue;
use Image;
use App\Http\Requests\PutGalleryRequest;
use App\Http\Requests\PostGalleryRequest;

/**
 * Class RoomService
 * @package App\Services
 */
class GalleryService
{
    const IMAGE_LOCATION = '/public/uploads/images/gallery/';

    protected function fileCheck($request){
        return ($request->hasFile('image')) ? 1:0;
    }
    public function make($model, $id, PostGalleryRequest $request)
    {
        return $this->createGallery($model, $id, $this->data($request, $this->fileCheck($request)));
    }

    public function update($id, PutGalleryRequest $request)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->update( $this->data($request, $this->fileCheck($request) ) );
        return $gallery->save();

    }

    /**
     * @param  $request
     * @param int $file Check if the file exists
     * @return array
     */
    protected function data( $request,$file = 0)
    {
        if($file == 1)
        {
            return [
                'title' => $request->get('title'),
                'image' => $this->fileUpload($request),
                'description' => $request->get('description'),
            ];
        }
        return [
            'title' => $request->get('title'),
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
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        return $gallery->delete();

    }

}
