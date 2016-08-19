<?php


namespace App\Services;

use App\Hotel;
use App\Http\Requests\PostContactRequest;
use App\Restaurant;
use App\Tour;
use App\Vehicle;
use App\Venue;
use App\Contact;

class ContactService
{


    public function make($model, $id, PostContactRequest $request)
    {
        return $this->createContact($model, $id, $this->data($request));
    }

    public function update($id, PostContactRequest $request)
    {
        $gallery = Contact::findOrFail($id);
        $gallery->update($this->data($request));
        return $gallery->save();


    }


    protected function data($request)
    {
        return [
            'zone' => $request->get('zone'),
            'district' => $request->get('district'),
            'representative' => $request->get('representative'),
            'role' => $request->get('role'),
            'address' => $request->get('address'),
            'phone1' => $request->get('phone1'),
            'phone2' => $request->get('phone2'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'fax' => $request->get('fax'),
            'facebook' => $request->get('facebook'),
            'website' => $request->get('website'),
            'latitude' => $request->get('latitude'),
            'longitude' => $request->get('longitude'),
        ];
    }

    public function createContact($model, $id, $data)
    {
        switch ($model) {
            case "restaurant":
                $gallery = Restaurant::findOrFail($id);
                return $gallery->contacts()->create($data);
                break;
            case "hotel":
                $gallery = Hotel::findorFail($id);
                return $gallery->contacts()->create($data);
                break;
            case "venue":
                $gallery = Venue::findOrFail($id);
                return $gallery->contacts()->create($data);
                break;
            case "tour":
                $gallery = Tour::findOrFail($id);
                return $gallery->contacts()->create($data);
                break;
            case "vehicle":
                $gallery = Vehicle::findOrFail($id);
                return $gallery->contacts()->create($data);
                break;
            default:
                return back()->session(['error' => 'No correct model can be found to insert ']);
                break;

        }
    }

}