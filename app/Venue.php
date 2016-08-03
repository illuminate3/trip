<?php

namespace App;


use App\Infinite\Contracts\GalleriesInterface;
use App\Infinite\Contracts\ReviewableInterface;
use Illuminate\Database\Eloquent\Model;

use App\Infinite\Contracts\ContactInterface;

class Venue extends Model implements ContactInterface, GalleriesInterface, ReviewableInterface
{
    protected $morphClass = "Venue";
    
    protected $table = "venues";

    protected $fillable = ["name", "slug", "status",'logo','user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function contacts()
    {
        return $this->morphOne('App\Contact', 'contactable');
    }

    public function galleries()
    {
        return $this->morphMany('App\Gallery', 'imageable');
    }

    public function reviews()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }
}
