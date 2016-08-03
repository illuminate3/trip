<?php
namespace App\Infinite\Transformers;


class VehicleTransformer extends Transformer
{

    public function transform($vehicle)
    {
        return [
            'name' => $vehicle['name'],
            'logo' => $vehicle['logo'],
            'slug' => $vehicle['slug'],
            'status' => (int) $vehicle['status'],
            'contact' => array(
                'address' => $vehicle['contacts']['address'],
                'latitude' => $vehicle['contacts']['latitude'],
                'longitude' => $vehicle['contacts']['longitude'],
                'zone' => $vehicle['contacts']['zone'],
                'district' => $vehicle['contacts']['district'],
                'representative' => $vehicle['contacts']['representative'],
                'role' => $vehicle['contacts']['role'],
                'phone-1' => $vehicle['contacts']['phone1'],
                'phone-2' => $vehicle['contacts']['phone2'],
                'mobile' => $vehicle['contacts']['mobile'],
                'email' => $vehicle['contacts']['email'],
                'facebook-link' => $vehicle['contacts']['facebook'],
                'website-link' => $vehicle['contacts']['website']
            ),
            'galleries' => $this->getGalleries($vehicle['galleries']),
            'reviews' => $this->getReviews($vehicle['reviews'])
        ];
    }

}