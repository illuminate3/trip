<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";

    public function hotels()
    {
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
}
