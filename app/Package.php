<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $morphClass = "Package";

    protected $table = 'packages';

    public function tours()
    {
        return $this->belongsTo(Tour::class,'tour_id');
    }

    public function galleries()
    {
        return $this->morphMany(Gallery::class, 'imageable');
    }

}
