<?php
namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Infinite\Contracts\ImageInterface;
use App\Infinite\Contracts\ContactInterface;
use App\Infinite\Contracts\GalleriesInterface;
use App\Infinite\Contracts\ReviewableInterface;

/**
 * Class Hotel
 * @package App
 */
class Hotel extends Model implements ContactInterface, GalleriesInterface, ReviewableInterface
{
    /**
     * @var string
     */
    protected $morphClass = "Hotel";
    /**
     * @var array
     */
    protected $fillable = ["name", "slug", "status",'logo','user_id'];
    protected $dates = ['created_at', 'updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contacts()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'imageable');
    }

    /**
     * @return mixed
     */
    public function reviews()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }

    /**
     * @return mixed
     */
    public function rooms()
    {
        return $this->hasMany(Room::class,'hotel_id');
    }
}
