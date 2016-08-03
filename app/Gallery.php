<?php

namespace App;

use App\Infinite\Contracts\GalleryInterface;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Gallery
 * @package App
 */
class Gallery extends Model implements GalleryInterface
{
    /**
     * @var array
     */
    protected $fillable = ["title", "image", "description", "imageable_id", "imageable_type"];


    /**
     * @return mixed
     */
    public function imageable()
    {
        return $this->morphTo();
    }


}
