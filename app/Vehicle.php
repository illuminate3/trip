<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Infinite\Contracts\ImageInterface;
use App\Infinite\Contracts\ContactInterface;
use App\Infinite\Contracts\GalleriesInterface;
use App\Infinite\Contracts\ReviewableInterface;

class Vehicle extends Model implements ContactInterface, GalleriesInterface, ReviewableInterface
{
    protected $morphClass = 'Vehicle';
    protected $table = 'vehicles';

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

    public function descriptions()
    {
        return $this->has(VehicleDescription::class, 'vehicle_id');
    }
}
