<?php

namespace App;


use App\Infinite\Contracts\ContactInterface;
use App\Infinite\Contracts\GalleriesInterface;
use App\Infinite\Contracts\ReviewableInterface;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model implements ContactInterface, GalleriesInterface, ReviewableInterface
{
    protected $morphClass = "Venue";

    protected $table = "venues";

    protected $fillable = ["name", "slug", "status", 'logo', 'user_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function offers()
    {
        return $this->morphMany(Offer::class, 'offerable');
    }
    
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
}
