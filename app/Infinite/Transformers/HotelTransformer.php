<?php
namespace App\Infinite\Transformers;


class HotelTransformer extends Transformer
{

    public function transform($hotel)
    {
        return [
            'name' => $hotel['name'],
            'logo' => $hotel['logo'],
            'slug' => $hotel['slug'],
            'status' => (int) $hotel['status'],
            'contact' => array(
                'address' => $hotel['contacts']['address'],
                'latitude' => $hotel['contacts']['latitude'],
                'longitude' => $hotel['contacts']['longitude'],
                'zone' => $hotel['contacts']['zone'],
                'district' => $hotel['contacts']['district'],
                'representative' => $hotel['contacts']['representative'],
                'role' => $hotel['contacts']['role'],
                'phone-1' => $hotel['contacts']['phone1'],
                'phone-2' => $hotel['contacts']['phone2'],
                'mobile' => $hotel['contacts']['mobile'],
                'email' => $hotel['contacts']['email'],
                'facebook-link' => $hotel['contacts']['facebook'],
                'website-link' => $hotel['contacts']['website']
            ),
            'galleries' => $this->getGalleries($hotel['galleries']),
            'reviews' => $this->getReviews($hotel['reviews'])
        ];
    }

}