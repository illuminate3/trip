<?php


namespace App\Services;

use App\Http\Requests\PostVehicleRequest;

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
        return Vehicle::create([
            'name' => $request->get('name'),
            'slug' => str_replace(" ", "-", strtolower($request->get('name'))),
            'description' => $request->get('description'),
            'logo' => $this->fileUpload($request),
            'user_id' => Auth::userId(),
        ]);
    }
    public function update($id, PostVehicleRequest $request)
    {
        $vehicle = Vehicle::findOrFail('id',$id);
        $vehicle->update([
            'name' => $request->get('name'),
            'slug' => str_replace(" ", "-", strtolower($request->get('name'))),
            'description' => $request->get('description'),
            'logo' => $this->fileUpload($request),
        ]);
        return $vehicle->save();
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
}
