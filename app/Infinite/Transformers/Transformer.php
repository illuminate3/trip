<?php
namespace App\Infinite\Transformers;


/**
 * Class Transformer
 * @package App\Infinite\Transformers
 */
abstract class Transformer
{

    /**
     * Transform a collection
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    /**
     * @param $item
     * @return mixed
     */
    public abstract function transform($item);

    /**
     * @param $array
     * @return array
     */
    public function getGalleries($array)
    {
        $gallery = [];
        $x = 0;
        foreach ($array as $arr) {
            $gallery[$x]['name'] = $arr['id'];
            $gallery[$x]['image'] = $arr['image'];
            $gallery[$x]['title'] = $arr['title'];
            $gallery[$x]['description'] = $arr['description'];
            $x++;
        }
        return $gallery;
    }

    public function getReviews($array)
    {
        $reviews = [];
        $x = 0;
        foreach($array as $arr){
            $reviews[$x]['rating'] = $arr['rating'];
            $reviews[$x]['review'] = $arr['review'];
            $x++;
        }
        return $reviews;
    }
}