<?php


namespace App\Services;

use App\Http\Requests\PostVehicleRequest;
use App\Http\Requests\PutVehicleRequest;
use Illuminate\Http\Request;
use App\Vehicle;
use Auth;
use Image;

class VehiclesService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/images/vehicle/';
    const DESCRIPTION_IMAGE_LOCATION = '/public/uploads/images/vehicle/';

    
    /**
     * @param PostVehicleRequest $request
     *
     * @return mixed
     */
    public function make(PostVehicleRequest $request)
    {
        $tour = new Vehicle();
        $tour->name = $request->get('name');
        $tour->slug = str_slug($request->get('slug'));
        $tour->description = $request->get('description');
        $file = $this->fileUpload($request);
        $tour->user_id = Auth::user()->id;
        $tour->logo = $file;
        return $tour->save();

    }

    public function update(PutVehicleRequest $request, $id)
    {
        $restaurant = Vehicle::findOrFail($id);
        $restaurant->name = $request->get('name');
        $restaurant->slug = str_slug($request->get('slug'));
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
        $img->save(base_path() . self::IMAGE_LOCATION . $fileName, 80);
        return $fileName;
    }
  

    public function findByName($name)
    {
        return Vehicle::where('name', 'LIKE', '%' . $name . '%')->get();
    }

    public function getIdBySlug($slug)
    {
        return Vehicle::select('id')->where('slug',$slug)->first()->id;
    }
    public function getAll()
    {
        return Vehicle::with('descriptions', 'contacts')->get();
    }

    public function getBySlugVehicle($slug, $id)
    {
        $this->getSlug($slug)->with('contacts')->whereHas('contacts', function ($query) use ($id) {
            return $query->where('id', $id);
        })->get();
    }

    public function findByAddress($address)
    {
        return Vehicle::with('contacts')->whereHas('contacts', function ($query) use ($address) {
            return $query->where('address', 'LIKE', '%' . $address . '%');
        })->get();
    }

    protected function getSlug($slug)
    {
        return Vehicle::where('slug', $slug);
    }

    public function getFirstDescription($vehicleSlug, $id)
    {
        return Vehicle::where('slug', $vehicleSlug)->with(['descriptions' => function ($query) use ($id) {
            $query->where('id', $id);
        }])->first()->descriptions->first();
    }

    protected function descriptionData($request,$vehicleId)
    {
        return [
            'type'=> $request->get('type'),
            'price'=> $request->get('price'),
            'doors'=> $request->get('doors'),
            'max_people'=> $request->get('max_people'),
            'manufacturer'=> $request->get('manufacturer'),
            'mileage'=> $request->get('mileage'),
            'description'=> $request->get('description'),
            'air_conditioned'=> $request->get('air_conditioned'),
            'vehicle_id' => $vehicleId
        ];
    }

    public function getIdFromSlug($slug)
    {
        return Vehicle::select('id')->where('slug',$slug)->first()->id;
    }

    public function getTransportsFromVehicles($slug)
    {
        return Vehicle::where('slug',$slug)->with('descriptions')->first();
    }

    public function makeDescription(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return $vehicle->descriptions()->create([$this->descriptionData($request,$id)]);
    }

    /**
     * @param Request $request
     * @param $id
     * @param $descriptionId
     *
     * @return mixed
     */
    public function updateDescription(Request $request, $id, $descriptionId)
    {
        $vehicle = Vehicle::findOrFail($id);
        return $vehicle->descriptions()->where('id',$descriptionId)->update([$this->descriptionData($request,$id)]);
    }

}
