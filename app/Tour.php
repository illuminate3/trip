<?php

namespace App;


use App\Infinite\Contracts\GalleriesInterface;
use App\Infinite\Contracts\ReviewableInterface;
use Illuminate\Database\Eloquent\Model;
use App\Infinite\Contracts\ImageInterface;
use App\Infinite\Contracts\ContactInterface;

class Tour extends Model implements ContactInterface, GalleriesInterface, ReviewableInterface
{
    protected $morphClass = "Tour";
    protected $fillable = ["name", "slug", "status",'logo','user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function contacts()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'imageable');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    public function packages()
    {
        return $this->hasMany(Package::class,'tour_id');
    }
}
