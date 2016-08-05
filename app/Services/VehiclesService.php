<?php


namespace App\Services;

use App\Http\Requests\PostVehicleRequest;
use App\Http\Requests\PutVehicleRequest;

use App\Vehicle;
use Auth;
use Image;

class VehiclesService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/vehicle/';

    /**
     * @param PostVehicleRequest $request
     * @return mixed
     */
    public function make(PostVehicleRequest $request)
    {
        $tour = new Vehicle();
        $tour->name = $request->get('name');
        $tour->slug = str_replace(" ", "-", strtolower($request->get('slug')));
        $tour->description = $request->get('description');
        $file = $this->fileUpload($request);
        $tour->user_id = Auth::user()->id;
        $tour->logo = $file;
        return $tour->save();
        
    }
    public function update(PutVehicleRequest $request,$id)
    {
        $restaurant = Vehicle::findOrFail($id);
        $restaurant->name = $request->get('name');
        $restaurant->slug = str_replace(" ", "-", strtolower($request->get('slug')));
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
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->status = 1;
        return $vehicle->save();
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
