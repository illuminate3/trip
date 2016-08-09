<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";

    protected $fillable = [
    'name', 'image','description','type','available_rooms','number_of_rooms'
    ];

    public function hotels()
    {
        return $this->belongsTo(Hotel::class,'hotel_id');
    }
}
