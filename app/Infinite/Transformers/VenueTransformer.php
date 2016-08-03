<?php
namespace App\Infinite\Transformers;


class VenueTransformer extends Transformer
{

    public function transform($venue)
    {
        return [
            'name' => $venue['name'],
            'logo' => $venue['logo'],
            'slug' => $venue['slug'],
            'status' => (int) $venue['status'],
            'contact' => array(
                'address' => $venue['contacts']['address'],
                'latitude' => $venue['contacts']['latitude'],
                'longitude' => $venue['contacts']['longitude'],
                'zone' => $venue['contacts']['zone'],
                'district' => $venue['contacts']['district'],
                'representative' => $venue['contacts']['representative'],
                'role' => $venue['contacts']['role'],
                'phone-1' => $venue['contacts']['phone1'],
                'phone-2' => $venue['contacts']['phone2'],
                'mobile' => $venue['contacts']['mobile'],
                'email' => $venue['contacts']['email'],
                'facebook-link' => $venue['contacts']['facebook'],
                'website-link' => $venue['contacts']['website']
            ),
            'galleries' => $this->getGalleries($venue['galleries']),
            'reviews' => $this->getReviews($venue['reviews'])
        ];
    }

}