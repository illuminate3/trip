<?php
namespace App\Infinite\Transformers;


class RestaurantTransformer extends Transformer
{

    public function transform($restaurant)
    {
        return [
            'name' => $restaurant['name'],
            'logo' => $restaurant['logo'],
            'slug' => $restaurant['slug'],
            'status' => (int) $restaurant['status'],
            'contact' => array(
                'address' => $restaurant['contacts']['address'],
                'latitude' => $restaurant['contacts']['latitude'],
                'longitude' => $restaurant['contacts']['longitude'],
                'zone' => $restaurant['contacts']['zone'],
                'district' => $restaurant['contacts']['district'],
                'representative' => $restaurant['contacts']['representative'],
                'role' => $restaurant['contacts']['role'],
                'phone-1' => $restaurant['contacts']['phone1'],
                'phone-2' => $restaurant['contacts']['phone2'],
                'mobile' => $restaurant['contacts']['mobile'],
                'email' => $restaurant['contacts']['email'],
                'facebook-link' => $restaurant['contacts']['facebook'],
                'website-link' => $restaurant['contacts']['website']
            ),
            'galleries' => $this->getGalleries($restaurant['galleries']),
            'reviews' => $this->getReviews($restaurant['reviews'])
        ];
    }

}