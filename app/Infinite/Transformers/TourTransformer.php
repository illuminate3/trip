<?php
namespace App\Infinite\Transformers;


class TourTransformer extends Transformer
{

    public function transform($tour)
    {
        return [
            'name' => $tour['name'],
            'logo' => $tour['logo'],
            'slug' => $tour['slug'],
            'status' => (int) $tour['status'],
            'contact' => array(
                'address' => $tour['contacts']['address'],
                'latitude' => $tour['contacts']['latitude'],
                'longitude' => $tour['contacts']['longitude'],
                'zone' => $tour['contacts']['zone'],
                'district' => $tour['contacts']['district'],
                'representative' => $tour['contacts']['representative'],
                'role' => $tour['contacts']['role'],
                'phone-1' => $tour['contacts']['phone1'],
                'phone-2' => $tour['contacts']['phone2'],
                'mobile' => $tour['contacts']['mobile'],
                'email' => $tour['contacts']['email'],
                'facebook-link' => $tour['contacts']['facebook'],
                'website-link' => $tour['contacts']['website']
            ),
            'galleries' => $this->getGalleries($tour['galleries']),
            'reviews' => $this->getReviews($tour['reviews'])
        ];
    }
    

}