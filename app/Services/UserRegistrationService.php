<?php
namespace App\Services;

use App\Hotel;
use App\Http\Requests\PostBusinessRegisterRequest as PostBusiness;
use App\Restaurant;
use App\Tour;
use App\Vehicle;
use App\Venue;
use Auth;

/**
 * Class UserRegistrationService
 * @package App\Services
 */
class UserRegistrationService
{
    /**
     *
     */
    const IMAGE_LOCATION = '/public/uploads/';

    /**
     * @param PostBusiness $request
     * @return mixed
     */
    public function businessRegister(PostBusiness $request)
    {

        return $this->registerBusiness($request->get('type'), [
            'user_id' => Auth::user()->id,
            'name' => $request->get('name'),
            'slug' => str_replace(" ", "-", $request->get('name')),
            'logo' => $this->upload($request),
            'description' => $request->get('description'),
            'status' => 0,
        ]);
    }


    /**
     * @param $name
     * @param array $data
     * @return mixed
     */
    public function registerBusiness($name, array $data)
    {
        switch ($name) {
            case "restaurant":
                $name = Restaurant::create($data);
                break;
            case "hotel":
                $name = Hotel::create($data);
                break;
            case "venue":
                $name = Venue::create($data);
                break;
            case "tour":
                $name = Tour::create($data);
                break;
            case "vehicle":
                $name = Vehicle::create($data);
                break;
            default:
                return back()->with(['error' => 'Please select the type']);
                break;
        }
        return $name;
    }

    /**
     * @param PostBusiness $request
     * @return mixed
     */
    public function upload(PostBusiness $request)
    {
        $file = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(
            base_path() . self::IMAGE_LOCATION, $file
        );
        return $file;
    }
}
