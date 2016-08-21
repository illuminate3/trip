<?php
namespace App\Services;

use App\Hotel;
use App\Http\Requests\PostHotelRequest;
use App\Http\Requests\PutHotelRequest;
use Auth;
use Image;

/**
 * Class HotelsService
 * @package App\Services
 */
class HotelsService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/hotel/';

    /**
     * @param PostHotelRequest $request
     *
     * @return bool
     */
    public function make(PostHotelRequest $request)
    {
        $hotel = new Hotel();
        $hotel->name = $request->get('name');
        $hotel->slug = str_slug($request->get('slug'));
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
        $hotel->slug = str_slug($request->get('slug'));
        $hotel->description = $request->get('description');
        if($request->file('image')){
            $file = $this->fileUpload($request);
            $hotel->logo = $file;
        }
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

    public function getLatestHotels()
    {
        return Hotel::with('contacts','galleries')->orderBy('updated_at','DES')->get();
    }
    
    public function getSlug($slug)
    {
        return Hotel::where('slug','=',$slug)->with('contacts','galleries','reviews')->first();
    }
    public function getIdBySlug($slug)
    {
        return Hotel::select('id')->where('slug',$slug)->first()->id;
    }

    public function getSimilarHotels()
    {
        return Hotel::orderBy('updated_at','DSC')->with('contacts')->take(10);
    }

    public function findSlug($slug)
    {
        return Hotel::where('slug','=', $slug)->first();
    }

    public function getSlugWithContacts($slug)
    {
        return Hotel::where('slug','=',$slug)->with('contacts');
    }

    public function findByAddress($address)
    {
        return Hotel::whereHas('contacts', function($query) use ($address){
            return $query->where('address','LIKE','%'.$address.'%');
        })->get();
    }
    
  
    public function findByName($name)
    {
        return Hotel::where('name', 'LIKE', '%' . $name . '%')->get();
    }
    public function getContactById($slug,$contactId)
    {
        return Hotel::where('slug','=',$slug)->with([
            'contacts' => function($query) use ($contactId){
                return $query->findOrFail($contactId);
            }
        ]);
    }

    public function getGalleriesBySlug($slug)
    {
        return $this->bySlug($slug)->with('galleries');
    }
    public function getGalleryById($slug,$id)
    {
        return Hotel::where('slug',$slug)->with(['galleries'=>function($query) use ($id){
            return $query->findOrFail($id);
        }]);
    }
    protected function bySlug($slug)
    {
        return Hotel::where('slug',$slug);
    }

}
